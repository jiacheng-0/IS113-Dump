drop database if exists week13ex1;
create database week13ex1;
use week13ex1;

create table account (
    id integer auto_increment primary key,
    fullname varchar(100),
    email varchar(200),
    pass varchar(1000)
);

insert into account (email, fullname, pass) values ('donald@trump.com', 'Donald Trump', 'donald123');
insert into account (email, fullname, pass) values ('donald@trump.com', 'Donald Trump', 'donald123');
insert into account (email, fullname, pass) values ('hillary@clinton.com', 'Hillary Clinton', 'hillary456');


create table task (
    id integer auto_increment primary key,
    account_id integer not null,
    constraint fk_account foreign key (account_id) references account(id),
    description varchar(1000)
);

insert into task (account_id, description) values (1, 'Reply to Chairman Kim Jong Un on Hanoi Summit');
insert into task (account_id, description) values (1, 'Buy Melania new shoes for wedding anniversary');
insert into task (account_id, description) values (1, 'Call back Vladimir Putin on September visit');
insert into task (account_id, description) values (1, 'Lunch with Hillary and Bill Clinton');
insert into task (account_id, description) values (1, 'Golf with Wharton alumni');


insert into task (account_id, description) values (2, 'Book signing in Richmond, Virginia');
insert into task (account_id, description) values (2, 'Dinner with Chelsea');
insert into task (account_id, description) values (2, "Review Bill's biography draft");
insert into task (account_id, description) values (2, 'Reply to Israeli government on Palestine');
insert into task (account_id, description) values (2, 'Attend Yoga Meditation on April 1');