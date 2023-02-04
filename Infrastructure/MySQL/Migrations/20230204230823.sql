CREATE TABLE mailings (
    id BINARY(16) NOT NULL,
    title VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL,
    status VARCHAR(64) NOT NULL,
    PRIMARY KEY(id)
)
