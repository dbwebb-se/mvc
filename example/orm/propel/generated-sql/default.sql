
-----------------------------------------------------------------------
-- book
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [book];

CREATE TABLE [book]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [title] VARCHAR(255) NOT NULL,
    [isbn] VARCHAR(24) NOT NULL,
    [publisher_id] INTEGER NOT NULL,
    [author_id] INTEGER NOT NULL,
    UNIQUE ([id]),
    FOREIGN KEY ([publisher_id]) REFERENCES [publisher] ([id]),
    FOREIGN KEY ([author_id]) REFERENCES [author] ([id])
);

-----------------------------------------------------------------------
-- author
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [author];

CREATE TABLE [author]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [first_name] VARCHAR(128) NOT NULL,
    [last_name] VARCHAR(128) NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- publisher
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [publisher];

CREATE TABLE [publisher]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [name] VARCHAR(128) NOT NULL,
    UNIQUE ([id])
);
