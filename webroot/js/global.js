/* This file contains global functions and variables for all JS scripts to use. */

global = {
		//parse url
		base_url: "http://" + location.host + location.pathname.substr(0, location.pathname.indexOf('/', 2))
};