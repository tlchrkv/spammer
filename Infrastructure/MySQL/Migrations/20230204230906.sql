CREATE TABLE mailing_subscriber_messages (
    id BINARY(16) NOT NULL,
    mailing_id BINARY(16) NOT NULL,
    subscriber_id BINARY(16) NOT NULL,
    status VARCHAR(64) NOT NULL,
    sent_at timestamp NULL,
    error_message TEXT NULL,
    PRIMARY KEY(id)
)
