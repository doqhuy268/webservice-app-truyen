INSERT INTO `users` (username, password, name, email, image, role) VALUES 
('admin', 'admin', 'Admin User', 'admin@example.com', 'admin_image.jpg', 'admin'),
('user1', 'user1', 'User One', 'user1@example.com', 'user1_image.jpg', 'member'),
('user2', 'user2', 'User Two', 'user2@example.com', 'user2_image.jpg', 'member'),
('user3', 'user3', 'User Three', 'user3@example.com', 'user3_image.jpg', 'member'),
('editor', 'editor', 'Editor User', 'editor@example.com', 'editor_image.jpg', 'editor'),
('user4', 'user4', 'User Four', 'user4@example.com', 'user4_image.jpg', 'member'),
('user5', 'user5', 'User Five', 'user5@example.com', 'user5_image.jpg', 'member'),
('moderator', 'moderator', 'Moderator User', 'moderator@example.com', 'moderator_image.jpg', 'moderator');

INSERT INTO `categories` (name, description) VALUES 
('Fantasy', 'Stories that contain magical elements.'),
('Romance', 'Stories focused on romantic relationships.'),
('Science Fiction', 'Fiction based on futuristic science and technology.'),
('Horror', 'Stories meant to scare or unsettle.'),
('Adventure', 'Exciting and risky journeys.'),
('Mystery', 'Stories about solving puzzles or crimes.'),
('Thriller', 'Stories full of suspense and excitement.'),
('Drama', 'Stories with intense character development.'),
('Comedy', 'Stories meant to amuse and entertain.');

INSERT INTO `authors` (name) VALUES
('Author One'),
('Author Two'),
('Author Three'),
('Author Four'),
('Author Five'),
('Author Six'),
('Author Seven'),
('Author Eight');

INSERT INTO `stories` (title, story_image, view_count, like_count, id_author) VALUES 
('The Magical Forest', 'forest.jpg', 0, 0, 1),
('Love in the Stars', 'stars.jpg', 0, 0, 2),
('Haunted Manor', 'haunted_manor.jpg', 0, 0, 3),
('Treasure Hunt', 'treasure.jpg', 0, 0, 4),
('The Time Machine', 'time_machine.jpg', 0, 0, 5),
('The Silent Witness', 'witness.jpg', 0, 0, 6),
('The Final Act', 'final_act.jpg', 0, 0, 7),
('Laughing Through Life', 'laughs.jpg', 0, 0, 8);

INSERT INTO `comments` (id_story, id_user, text) VALUES 
(1, 1, 'Great story! Looking forward to more.'),
(2, 2, 'I loved this chapter!'),
(3, 2, 'This gave me chills! Amazing work.'),
(4, 3, 'I can’t wait to see what happens next!'),
(5, 1, 'Interesting concept, very creative.'),
(6, 4, 'This kept me on the edge of my seat!'),
(7, 5, 'A touching story with deep emotions.'),
(8, 2, 'So funny! I couldn’t stop laughing.');

INSERT INTO `chapters` (name, content, id_story) VALUES 
('Chapter 1 - The Beginning', 'Content of chapter 1 of The Magical Forest...', 1),
('Chapter 1 - A New Love', 'Content of chapter 1 of Love in the Stars...', 2),
('Chapter 1 - The Haunted Arrival', 'Content of chapter 1 of Haunted Manor...', 3),
('Chapter 1 - The Map Discovery', 'Content of chapter 1 of Treasure Hunt...', 4),
('Chapter 1 - The Experiment', 'Content of chapter 1 of The Time Machine...', 5),
('Chapter 1 - The Mysterious Figure', 'Content of chapter 1 of The Silent Witness...', 6),
('Chapter 1 - The Final Performance', 'Content of chapter 1 of The Final Act...', 7),
('Chapter 1 - A Day of Laughs', 'Content of chapter 1 of Laughing Through Life...', 8);


INSERT INTO `category_story` (id_category, id_story) VALUES 
(1, 1),
(2, 2),
(3, 1);
(4, 3),
(5, 4),
(3, 5),
(6, 6),
(7, 7),
(8, 8);

INSERT INTO `favourites` (id_user, id_story) VALUES 
(1, 1),
(2, 2);
(2, 3),
(3, 4),
(1, 5),
(4, 6),
(5, 7),
(3, 8);

INSERT INTO `histories` (id_user, id_story, id_chapter) VALUES 
(1, 1, 1),
(2, 2, 1);
(2, 3, 1),
(3, 4, 1),
(1, 5, 1),
(4, 6, 1),
(5, 7, 1),
(2, 8, 1);