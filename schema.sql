create database if not exists calendar;

use calendar;

create table if not exists weekly_calendar_tasks (
    id BIGINT not null auto_increment,
    uid BIGINT not null,
    year INT,
    week INT,
    w_day INT,
    task CHAR(1),
    flag BOOL default null,
    insert_ts DATETIME,
    update_ts TIMESTAMP default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

create UNIQUE INDEX index_users_weekly_tasks
ON weekly_calendar_tasks (uid, year, week, w_day, task);
