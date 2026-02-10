-- Table : Films --

CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title varchar (255) not null,
    desciption text,
    duration INT not null, note: "Duration in minutes",
    release_year DATE not null,
    genre varchar(100),
    director varchar(100),
    created_at datetime,
    updated_at datetime
);

-- Table : Salles --

CREATE TABLE rooms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar (100) not null,
    capacity INT not null,
    type varchar(100),
    active BOOLEAN not nul, default: true, note: "Soft delete flag",
    created_at datetime,
    updated_at datetime
)

-- Table : séances --

CREATE TABLE screenings (
    id int PRIMARY KEY AUTO_INCREMENT, 
    movie_id INT not null,
    room_id INT not null,
    start_time datetime not null,
    updated_at datetime


    CONSTRAINT fk_screenings_movie
        FOREIGN KEY (movie_id) REFERENCES movies(id),

    CONSTRAINT fk_screenings_room
        FOREIGN KEY (room_id) REFERENCES rooms(id)
);