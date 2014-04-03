create database calendar;

use calendar;

create table weekly_calendar (
    year INT,
    week INT,
    w_day INT,
    task CHAR(1),
    flag BOOL default null
);
