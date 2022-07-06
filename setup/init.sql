PRAGMA foreign_keys = ON;

CREATE TABLE users (
	username TEXT PRIMARY KEY,
	password BLOB NOT NULL,
	register_date INTEGER NOT NULL
);

CREATE TABLE posts (
	id INTEGER PRIMARY KEY,
	message TEXT NOT NULL,
	author INTEGER NOT NULL,
	parent INTEGER,
	publish_date INTEGER NOT NULL,
	FOREIGN KEY (author) REFERENCES users (username),
	FOREIGN KEY (parent) REFERENCES posts (id)
);

CREATE TABLE interaction (
	id INTEGER PRIMARY KEY,
	user INTEGER NOT NULL,
	post INTEGER NOT NULL,
	sentiment INTEGER,
	FOREIGN KEY (user) REFERENCES users (username),
	FOREIGN KEY (post) REFERENCES posts (id)
);
