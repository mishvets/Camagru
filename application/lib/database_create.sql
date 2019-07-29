CREATE TABLE IF NOT EXISTS `users`(
`id` int NOT NULL AUTO_INCREMENT,
`login` TEXT NOT NULL,
`email` TEXT NOT NULL,
`password` TEXT NOT NULL,
`code` TEXT NOT NULL,
`active` tinyint NULL,
PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `photos` (
`id_p` int NOT NULL AUTO_INCREMENT,
`id_u` int NOT NULL,
`date` DATE NOT NULL,
PRIMARY KEY (`id_p`),
FOREIGN KEY (`id_u`) REFERENCES `users`(`id`) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `comments` (
`id_c` int NOT NULL AUTO_INCREMENT,
`id_u` int NOT NULL,
`id_p` int NOT NULL,
`comment` TEXT NOT NULL,
`date` DATE NOT NULL,
PRIMARY KEY (`id_c`),
FOREIGN KEY (`id_u`) REFERENCES `users`(`id`) ON DELETE CASCADE,
FOREIGN KEY (`id_p`) REFERENCES `photos`(`id_p`) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS `likes` (
`id_l` int NOT NULL AUTO_INCREMENT,
`id_p` int NOT NULL,
`id_u` int NOT NULL,
PRIMARY KEY (`id_l`),
FOREIGN KEY (`id_p`) REFERENCES `photos`(`id_p`) ON DELETE CASCADE,
FOREIGN KEY (`id_u`) REFERENCES `users`(`id`) ON DELETE CASCADE
);