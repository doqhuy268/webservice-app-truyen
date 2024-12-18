CREATE TABLE `authors` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE `categories` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `description` TEXT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE `users` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NULL,
    `email` VARCHAR(255) NULL,
    `image` VARCHAR(255) NULL,
    `role` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE `stories` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `story_image` VARCHAR(255) NULL,
    `view_count` INT DEFAULT 0,
    `like_count` INT DEFAULT 0,
    `id_author` BIGINT UNSIGNED NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_author`) REFERENCES `authors`(`id`) ON DELETE CASCADE
);

CREATE TABLE `comments` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_story` BIGINT UNSIGNED NOT NULL,
    `id_user` BIGINT UNSIGNED NOT NULL,
    `text` TEXT NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_story`) REFERENCES `stories`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

CREATE TABLE `chapters` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `id_story` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_story`) REFERENCES `stories`(`id`) ON DELETE CASCADE
);

CREATE TABLE `category_story` (
    `id_category` BIGINT UNSIGNED NOT NULL,
    `id_story` BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (`id_category`, `id_story`),
    FOREIGN KEY (`id_category`) REFERENCES `categories`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_story`) REFERENCES `stories`(`id`) ON DELETE CASCADE
);

CREATE TABLE `favourites` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_user` BIGINT UNSIGNED NOT NULL,
    `id_story` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_story`) REFERENCES `stories`(`id`) ON DELETE CASCADE
);

CREATE TABLE `histories` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_user` BIGINT UNSIGNED NOT NULL,
    `id_story` BIGINT UNSIGNED NOT NULL,
    `id_chapter` BIGINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_story`) REFERENCES `stories`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_chapter`) REFERENCES `chapters`(`id`) ON DELETE CASCADE
);