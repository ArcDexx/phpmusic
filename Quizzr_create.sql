-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-07-04 21:59:43.921

-- tables
-- Table: Game
CREATE TABLE Games (
    id int NOT NULL AUTO_INCREMENT,
    genre varchar(64) NOT NULL,
    current_sample int NOT NULL,
    nb_players int NOT NULL,
    current_first int NULL,
    current_second int NULL,
    current_third int NULL,
    CONSTRAINT Game_pk PRIMARY KEY (id)
);

-- Table: Games_samples
CREATE TABLE Games_samples (
    id int NOT NULL AUTO_INCREMENT,
    sample_id int NOT NULL,
    game_id int NOT NULL,
    CONSTRAINT Games_samples_pk PRIMARY KEY (id)
);

-- Table: Games_users
CREATE TABLE Games_users (
    id int NOT NULL AUTO_INCREMENT,
    game_id int NOT NULL,
    user_id int NOT NULL,
    score int NOT NULL DEFAULT 0,
    CONSTRAINT Games_users_pk PRIMARY KEY (id)
);

-- Table: Sample
CREATE TABLE Samples (
    id int NOT NULL AUTO_INCREMENT,
    title varchar(64) NOT NULL,
    artist varchar(64) NOT NULL,
    genre varchar(64) NOT NULL,
    album varchar(64) NOT NULL,
    image varchar(512) NOT NULL,
    CONSTRAINT Sample_pk PRIMARY KEY (id)
);

-- Table: User
CREATE TABLE Users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(256) NOT NULL,
    login varchar(32) NOT NULL,
    password varchar(32) NOT NULL,
    image varchar(512) NOT NULL,
    games_played int NOT NULL DEFAULT 0,
    games_won int NOT NULL DEFAULT 0,
    total_score int NOT NULL DEFAULT 0,
    is_guest bool NOT NULL,
    CONSTRAINT User_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: Games_users_Game (table: Games_users)
ALTER TABLE Games_users ADD CONSTRAINT Games_users_Game FOREIGN KEY Games_users_Game (game_id)
    REFERENCES Games (id);

-- Reference: Games_users_User (table: Games_users)
ALTER TABLE Games_users ADD CONSTRAINT Games_users_User FOREIGN KEY Games_users_User (user_id)
    REFERENCES Users (id);

-- Reference: games_samples_Game (table: Games_samples)
ALTER TABLE Games_samples ADD CONSTRAINT games_samples_Game FOREIGN KEY games_samples_Game (game_id)
    REFERENCES Games (id);

-- Reference: games_samples_Samples (table: Games_samples)
ALTER TABLE Games_samples ADD CONSTRAINT games_samples_Samples FOREIGN KEY games_samples_Samples (sample_id)
    REFERENCES Sampled (id);

-- End of file.

