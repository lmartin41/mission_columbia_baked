(function($){
    var v=document.createElement('input');
    v.type='file';
    var w=('multiple'in v&&typeof File!="undefined"&&typeof(new XMLHttpRequest()).upload!="undefined");
    v=null;
    function getURL(a,b,d){
        var e=(typeof(a.remotePath)=='function')?a.remotePath():a.remotePath;
        var f=[];
        f.push('ax-file-path='+encodeURIComponent(e));
        f.push('ax-allow-ext='+encodeURIComponent(a.allowExt.join('|')));
        f.push('ax-file-name='+encodeURIComponent(b));
        f.push('ax-thumbHeight='+a.thumbHeight);
        f.push('ax-thumbWidth='+a.thumbWidth);
        f.push('ax-thumbPostfix='+encodeURIComponent(a.thumbPostfix));
        f.push('ax-thumbPath='+encodeURIComponent(a.thumbPath));
        f.push('ax-thumbFormat='+encodeURIComponent(a.thumbFormat));
        f.push('ax-maxFileSize='+encodeURIComponent(a.maxFileSize));
        f.push('ax-fileSize='+d);
        var g=(typeof(a.data)=='function')?a.data():a.data;
        if(typeof(g)=='object'){
            for(var i in g){
                f.push(i+'='+encodeURIComponent(g[i]))
                }
            }else if(typeof(g)=='string'&&g!=''){
        f.push(g)
        }
        var c=(a.url.indexOf('?')==-1)?'?':'&';
    return a.url+c+f.join('&')
    }
    function uploadAjax(b,c){
    var d=b.file;
    var f=b.byte;
    var g=b.name;
    var h=d.size;
    var i=c.chunkSize;
    var j=i+f;
    var k=(h-j<=0);
    var l=d;
    var m=new XMLHttpRequest();
    var n=j/i;
    b.xhr=m;
    if(f==0)c.SLOTS++;
    if(i==0){
        l=d;
        k=true
        }else if(d.mozSlice){
        l=d.mozSlice(f,j)
        }else if(d.webkitSlice){
        l=d.webkitSlice(f,j)
        }else if(d.slice){
        l=d.slice(f,i)
        }else{
        l=d;
        k=true
        }
        m.upload.addEventListener('abort',function(e){
        c.SLOTS--
    },false);
    m.upload.addEventListener('progress',function(e){
        if(e.lengthComputable){
            var a=Math.round((e.loaded+n*i-i)*100/h);
            b.progress(a)
            }
        },false);
m.upload.addEventListener('error',function(e){
    b.error(this.responseText,g)
    },false);
m.onreadystatechange=function(){
    if(this.readyState==4&&this.status==200){
        try{
            var a=JSON.parse(this.responseText);
            if(f==0)b.name=a.name;
            if(k){
                c.SLOTS--;
                b.end(a.name,a.size,a.status,a.info)
                }else if(a.status=='error'){
                throw a.info;
            }else{
                b.byte=j;
                uploadAjax(b,c)
                }
            }catch(err){
        c.SLOTS--;
        b.error('error',err)
        }
    }
};

var o=getURL(c,g,h);
m.open('POST',o+'&ax-start-byte='+f+'&isLast='+k,c.async);
m.setRequestHeader('Cache-Control','no-cache');
m.setRequestHeader('X-Requested-With','XMLHttpRequest');
m.setRequestHeader('Content-Type','application/octet-stream');
m.send(l)
}
function generateBoundary(){
    return"AJAX-----------------------"+(new Date).getTime()
    }
    function createPreview(f,g,h,i){
    if(g.type.match(/image.*/)&&(h=='jpg'||h=='gif'||h=='png')&&typeof(FileReader)!=="undefined"){
        var j=f.css('background','none').children('img:first');
        var k=new FileReader();
        k.onload=function(e){
            j.css('cursor','pointer').attr('src',e.target.result).click(function(){
                var d=new Image();
                d.onload=function(){
                    var a=Math.min($(window).width()/this.width,($(window).height()-100)/this.height);
                    var b=(a<1)?this.width*a:this.width;
                    var c=(a<1)?this.height*a:this.height;
                    $('#ax-box').html('<img width="'+b+'" height="'+c+'" src="'+e.target.result+'" /><a>Close</a><span>'+g.name+'</span>').fadeIn(100).css({
                        'top':($(window).scrollTop()-20+($(window).height()-c)/2)+'px',
                        'height':(c+20)+'px',
                        'width':b+'px',
                        'left':($(window).width()-b)/2
                        });
                    $('#ax-box').find('a').css('cursor','pointer').click(function(e){
                        e.preventDefault();
                        $('#ax-box-shadow, #ax-box').fadeOut(100)
                        });
                    $('#ax-box-shadow').css('height',$(document).height()).fadeIn(100)
                    };
                    
                d.src=e.target.result
                })
            };
            
        k.readAsDataURL(g)
        }else{
        f.children('img:first').remove();
        f.addClass('ax-filetype-'+h)
        }
    }
function uploadAll(b){
    setTimeout(function(){
        var a=true;
        for(var i=0;i<b.length;i++){
            if(b[i].xhr===null&&b[i].status!='uploaded'&&b[i].status!='error'){
                a=false;
                b[i].sns()
                }
            }
        if(!a)uploadAll(b)
        },300)
}
function sizeFormat(a,b){
    switch(a){
        case'gb':
            b=b/(1024*1024*1024);
            break;
        case'mb':
            b=b/(1024*1024);
            break;
        case'kb':
            b=b/(1024);
            break
            }
            return(Math.round(b*100)/100)+' '+a
    }
    function fileTemplate(d,f,g){
    var h=f.name;
    var i=sizeFormat(g.showSize,f.size);
    var j=$('<li />').appendTo(d).attr('title',h);
    var k=$('<a class="ax-prev-container" />').appendTo(j);
    var l=$('<img class="ax-preview" src="" alt="Preview" />').appendTo(k);
    var m=$('<div class="ax-details" />').appendTo(j);
    var n=$('<div class="ax-file-name">'+h+'</div>').appendTo(m);
    if(g.editFilename){
        n.dblclick(function(e){
            e.stopPropagation();
            var a=h.substr(0,h.lastIndexOf("."));
            $(this).html('<input type="text" value="'+a+'" />.'+f.ext)
            }).bind('blur',function(e){
            e.stopPropagation();
            var a=$(this).children('input').val();
            if(typeof(a)!='undefined'){
                var b=a.replace(/[|&;$%@"<>()+,]/g,'');
                var c=b+'.'+f.ext;
                $(this).html(c);
                f.name=c;
                if(!w&&f.xhr){
                    f.xhr.children('input[name="ax-file-name"]').val(c)
                    }
                }
        })
}
var o=$('<div class="ax-file-size">'+i+'</div>').appendTo(m);
var p=$('<div class="ax-progress" />').appendTo(j);
var q=$('<div class="ax-progress-bar" />').appendTo(p);
var r=$('<div class="ax-progress-info">0%</div>').appendTo(p);
var s=$('<div class="ax-toolbar" />').appendTo(j);
var t=$('<a title="Start upload" class="ax-upload ax-button" />').click(function(){
    if(g.enable)f.sns()
        }).appendTo(s).append('<span class="ax-upload-icon ax-icon"></span>');
var u=$('<a title="Remove file" class="ax-remove ax-button" />').click(function(){
    if(g.enable)f.remove()
        }).appendTo(s).append('<span class="ax-clear-icon ax-icon"></span>');
createPreview(k,f.file,f.ext,g);
return{
    pBar:q,
    pNum:r,
    upload:t,
    remove:u,
    nameC:n,
    li:j,
    sizeC:o
}
}
function ajaxList(f,g,h){
    var i=h.FILES;
    var k=fileTemplate(f,g,h);
    var l=k.upload;
    var m=k.remove;
    g.tools=k;
    g.end=function(a,b,c,d){
        h.UPLOADED++;
        this.name=a;
        this.status=c;
        this.info=d;
        this.xhr=null;
        this.byte=0;
        this.tools.nameC.html(a);
        this.tools.li.attr('title',a);
        this.tools.pNum.html('100%');
        this.tools.pBar.css('width','100%');
        this.tools.upload.removeClass('ax-abort');
        h.success(a);
        if(i.length==h.UPLOADED){
            var e=[];
            h.UPLOADED=0;
            for(var j=0;j<i.length;j++)e.push(i[j].name);
            h.finish(e);
            h.internalFinish(e)
            }
        };
    
g.progress=function(p){
    this.tools.pNum.html(p+'%');
    this.tools.pBar.css('width',p+'%')
    };
    
g.error=function(a,b){
    this.xhr=null;
    this.byte=0;
    this.status=a;
    this.info=b;
    this.tools.pNum.html(b);
    this.tools.pBar.css('width','0%');
    this.tools.upload.removeClass('ax-abort');
    h.error(b,this.name)
    };
    
g.sns=function(a){
    if(this.xhr!==null){
        this.xhr.abort();
        this.xhr=null;
        this.byte=0;
        this.tools.upload.removeClass('ax-abort')
        }else if(h.SLOTS<h.maxConnections){
        this.tools.pNum.html('0%');
        this.tools.pBar.css('width','0%');
        this.tools.upload.addClass('ax-abort');
        uploadAjax(this,h)
        }
    };

g.remove=function(){
    i.splice(this.pos,1);
    if(this.xhr)this.xhr.abort();
    this.file=null;
    this.xhr=null;
    for(var j=0;j<i.length;j++)i[j].pos=j;
    this.tools.li.remove()
    }
}
function formList(f,g,h){
    var i=h.FILES;
    var k=fileTemplate(f,g,h);
    var l=k.upload;
    var m=k.remove;
    var n=document.getElementById('ax-main-frame');
    var o=getURL(h,'',0);
    var q=$('<form action="'+o+'" method="post" target="ax-main-frame" encType="multipart/form-data" />').hide().appendTo(k.li);
    q.append('<input type="hidden" value="'+encodeURIComponent(g.name)+'" name="ax-file-name" />');
    $(g.file).appendTo(q);
    g.xhr=q;
    g.tools=k;
    g.end=function(a,b,c,d){
        h.UPLOADED++;
        this.name=a;
        this.status=c;
        this.info=d;
        this.byte=0;
        this.size=b;
        this.tools.nameC.html(a);
        this.tools.sizeC.html(sizeFormat(h.showSize,b));
        this.tools.li.attr('title',a);
        if(c=='error'){
            this.tools.pNum.html(d);
            this.tools.pBar.css('width','0%')
            }else{
            this.tools.pNum.html('100%');
            this.tools.pBar.css('width','100%')
            }
            this.tools.upload.removeClass('ax-abort');
        h.success(a);
        if(i.length==h.UPLOADED){
            var e=[];
            h.UPLOADED=0;
            for(var j=0;j<i.length;j++)e.push(i[j].name);
            h.finish(e);
            h.internalFinish(e)
            }
        };
    
g.progress=function(p){
    this.tools.pNum.html(p+'%');
    this.tools.pBar.css('width',p+'%')
    };
    
g.sns=function(){
    if(l.hasClass('ax-abort')){
        try{
            n.contentWindow.document.execCommand('Stop')
            }catch(ex){
            n.contentWindow.stop()
            }
            l.removeClass('ax-abort')
        }else{
        this.tools.pNum.html(0+'%');
        this.tools.pBar.css('width',0+'%');
        this.tools.upload.addClass('ax-abort');
        uploadForm(this,false,i)
        }
    };

g.remove=function(){
    i.splice(this.pos,1);
    try{
        n.contentWindow.document.execCommand('Stop')
        }catch(ex){
        n.contentWindow.stop()
        }
        $(this.file).remove();
    this.file=null;
    for(var j=0;j<i.length;j++)i[j].pos=j;
    this.tools.li.remove()
    }
}
function uploadForm(c,d,e){
    if(e.length>0){
        $('#ax-main-frame').unbind('load').bind('load',function(){
            var a;
            if(this.contentDocument){
                a=this.contentDocument
                }else if(this.contentWindow){
                a=this.contentWindow.document
                }
                var b=$.parseJSON(a.body.innerHTML);
            c.progress(100);
            c.end(b.name,b.size,b.status,b.info);
            if(d&&e[c.pos+1]){
                uploadForm(e[c.pos+1],true,e)
                }
            });
    c.xhr.submit()
    }
}
function addFiles(a,b,c){
    var d=c.FILES;
    for(var i=0;i<a.length;i++){
        var e,name,size,pos=d.length;
        if(w){
            name=a[i].name;
            size=a[i].size
            }else{
            name=a[i].value.replace(/^.*\\/,'');
            size=0
            }
            e=name.split('.').pop().toLowerCase();
        if(d.length<c.maxFiles&&($.inArray(e,c.allowExt)>=0||c.allowExt.length==0)){
            var f={
                pos:pos,
                byte:0,
                sns:function(){},
                error:function(){},
                end:function(){},
                progress:function(){},
                file:a[i],
                status:'ok',
                name:name,
                size:size,
                xhr:null,
                info:'',
                ext:e
            };
            
            d.push(f);
            if(w)ajaxList(b,f,c);else formList(b,f,c)
                }
            }
    }
function startUpload(a){
    (w)?uploadAll(a):uploadForm(a[0],true,a)
    }
    function clearQueue(a){
    if(!a.enable)return;
    while(a.FILES.length>0)a.FILES[0].remove()
        }
        var x={
    remotePath:'js/',
    url:'upload.php',
    data:'',
    async:true,
    maxFiles:9999,
    allowExt:[],
    showSize:'Mb',
    success:function(a){},
    finish:function(a){},
    error:function(a,b){},
    enable:true,
    chunkSize:1024*1024,
    maxConnections:3,
    dropColor:'red',
    dropArea:'self',
    autoStart:false,
    thumbHeight:0,
    thumbWidth:0,
    thumbPostfix:'_thumb',
    thumbPath:'',
    thumbFormat:'',
    maxFileSize:'1001M',
    form:null,
    editFilename:false,
    sortable:false
};

var y={
    init:function(r){
        return this.each(function(){
            var d=$(this);
            if(d.hasClass('ax-uploader')){
                return
            }
            d.addClass('ax-uploader').data('author','http://www.albanx.com/');
            var f=$.extend({},x,r);
            f.FILES=[];
            f.UPLOADED=0;
            f.SLOTS=0;
            f.internalFinish=function(){};
            
            var g=null;
            if($(f.form).length>0)g=$(f.form);
            else if(f.form=='parent')g=d.parents('form:first');
            if(typeof(g)!='undefined'&&g!=null){
                $(g).bind('submit.ax',function(){
                    if(f.FILES.length>0){
                        startUpload(f.FILES);
                        return false
                        }
                    });
            f.internalFinish=function(a){
                if(g!=null){
                    var b=(typeof(f.remotePath)=='function')?f.remotePath():f.remotePath;
                    for(var i=0;i<a.length;i++){
                        var c=b+a[i];
                        $(g).append('<input name="ax-uploaded-files[]" type="hidden" value="'+c+'" />')
                        }
                        $(g).unbind('submit.ax').submit()
                    }
                }
        }
        f.showSize=f.showSize.toLowerCase();
    f.allowExt=$.map(f.allowExt,function(n,i){
        return n.toLowerCase()
        });
    d.data('settings',f);
    if($('#ax-box').length==0)$('<div id="ax-box"/>').appendTo('body');
    if($('#ax-box-shadow').length==0)$('<div id="ax-box-shadow"/>').appendTo('body');
    if($('#ax-main-frame').length==0)$('<iframe name="ax-main-frame" id="ax-main-frame" />').hide().appendTo('body');
    var h=$('<fieldset />').append('<legend class="ax-legend">Upload Photo</legend>').appendTo(d);
    var j=$('<a class="ax-browse-c ax-button" title="Add Files" />').appendTo(h);
    j.append('<span class="ax-plus-icon ax-icon"></span> <span>Add Files</span>');
    var k=$('<input type="file" class="ax-browse" name="ax-files[]" />').attr('multiple',w).appendTo(j);
    var l=$('<a class="ax-upload-all ax-button" title="Upload all files" />').appendTo(h);
    l.append('<span class="ax-upload-icon ax-icon"></span> <span>Start upload</span>');
    var m=$('<a class="ax-clear ax-button" title="Clear all" />').appendTo(h);
    m.append('<span class="ax-clear-icon ax-icon"></span> <span>Remove all</span>');
    var o=$('<ul class="ax-file-list" />').appendTo(h);
    var p=$('<span class="ax-net-info"></span>').appendTo(d);
    k.bind('change',function(){
        if(!f.enable)return;
        if(w){
            addFiles(this.files,o,f);
            if(navigator.userAgent.toLowerCase().indexOf('chrome')>-1);
            refreshBrowse()
            }else{
            addFiles([this],o,f);
            $(this).clone(true).val('').appendTo(j);
            $(this).hide()
            }
            if(f.autoStart){
            startUpload(f.FILES)
            }
        });
function refreshBrowse(){
    var a=k.clone(true).appendTo(j);
    k.remove();
    k=a
    }
    l.bind('click',function(){
    if(!f.enable)return;
    startUpload(f.FILES);
    return false
    });
m.bind('click',function(){
    clearQueue(f);
    return false
    });
if(w){
    var q=(f.dropArea=='self')?this:$(f.dropArea).get(0);
    q.addEventListener('dragenter',function(e){
        e.stopPropagation();
        e.preventDefault()
        },false);
    q.addEventListener('dragover',function(e){
        if(!f.enable)return;
        e.stopPropagation();
        e.preventDefault();
        $(this).css('background-color',f.dropColor)
        },false);
    q.addEventListener('dragleave',function(e){
        e.stopPropagation();
        e.preventDefault();
        $(this).css('background-color','')
        },false);
    q.addEventListener('drop',function(e){
        if(!f.enable)return;
        e.stopPropagation();
        e.preventDefault();
        addFiles(e.dataTransfer.files,o,f);
        $(this).css('background-color','');
        if(f.autoStart){
            startUpload(f.FILES)
            }
        },false)
}
d.bind('click.ax',function(e){
    if(e.target.nodeName!='INPUT')$('.ax-file-name').trigger('blur')
        });
$(document).unbind('.ax').bind('keyup.ax',function(e){
    if(e.keyCode==27){
        $('#ax-box-shadow, #ax-box').fadeOut(100)
        }
    });
if(!f.enable){
    d.ajaxupload('disable')
    }
})
},
enable:function(){
    return this.each(function(){
        var a=$(this);
        var b=a.data('settings');
        b.enable=true;
        a.data('settings',b);
        $(this).removeClass('ax-disabled').find('input').attr('disabled',false)
        })
    },
disable:function(){
    return this.each(function(){
        var a=$(this);
        var b=a.data('settings');
        b.enable=false;
        a.data('settings',b);
        $(this).addClass('ax-disabled').find('input').attr('disabled',true)
        })
    },
start:function(){
    return this.each(function(){
        var a=$(this).data('settings');
        startUpload(a.FILES)
        })
    },
clear:function(){
    return this.each(function(){
        var a=$(this).data('settings');
        clearQueue(a)
        })
    },
destroy:function(){
    return this.each(function(){
        var a=$(this).data('settings');
        clearQueue(a);
        $(this).removeData('settings').html('')
        })
    },
option:function(c,d){
    return this.each(function(){
        var a=$(this);
        var b=a.data('settings');
        if(d!=null&&d!=undefined){
            b[c]=d;
            a.data('settings',b);
            if(!b.enable){
                a.ajaxupload('disable')
                }else{
                a.ajaxupload('enable')
                }
            }else{
        return b[c]
        }
    })
}
};

$.fn.ajaxupload=function(a,b){
    if(y[a]){
        return y[a].apply(this,Array.prototype.slice.call(arguments,1))
        }else if(typeof a==='object'||!a){
        return y.init.apply(this,arguments)
        }else{
        $.error('Method '+a+' does not exist on jQuery.ajaxupload')
        }
    }
})(jQuery);