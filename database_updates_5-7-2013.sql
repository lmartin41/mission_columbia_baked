ALTER TABLE  `prayer_requests` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `comments`;
ALTER TABLE  `client_relations` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `whatVerification`;
ALTER TABLE  `feedbacks` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `feedback`;
ALTER TABLE  `fields` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `field_type`;
ALTER TABLE  `field_instances` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `field_value`;
ALTER TABLE  `lookups` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `custom_name`;
ALTER TABLE  `resource_uses` ADD  `isDeleted` TINYINT NOT NULL DEFAULT  '0' AFTER  `comments`;
ALTER TABLE  `clients` ADD  `comments` TEXT NULL AFTER  `model`;
