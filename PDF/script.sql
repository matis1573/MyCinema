-- Table : Films --

CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    duration INT NOT NULL, -- Duration in minutes
    release_year DATE NOT NULL,
    genre VARCHAR(100),
    director VARCHAR(100),
    created_at DATETIME,
    updated_at DATETIME
);

-- Table : Salles --

CREATE TABLE rooms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    type VARCHAR(100),
    active BOOLEAN NOT NULL DEFAULT TRUE, -- Soft delete flag
    created_at DATETIME,
    updated_at DATETIME
);

-- Table : séances --

CREATE TABLE screenings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    movie_id INT NOT NULL,
    room_id INT NOT NULL,
    start_time DATETIME NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,


    CONSTRAINT fk_screenings_movie FOREIGN KEY (movie_id) REFERENCES movies(id),
    CONSTRAINT fk_screenings_room FOREIGN KEY (room_id) REFERENCES rooms(id)
);
