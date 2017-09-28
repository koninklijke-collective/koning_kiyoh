#
# Table structure for table 'tx_koningkiyoh_domain_model_company'
#
CREATE TABLE tx_koningkiyoh_domain_model_company (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0',
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    editlock tinyint(4) DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

    remote_identifier int(11) DEFAULT '0',
    name varchar(255) DEFAULT '',
    url varchar(255) DEFAULT '',
    reviews int(11) DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)
);

#
# Table structure for table 'tx_koningkiyoh_domain_model_review'
#
CREATE TABLE tx_koningkiyoh_domain_model_review (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0',
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    editlock tinyint(4) DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

    remote_identifier int(11) DEFAULT '0',
    name varchar(255) DEFAULT '',
    company int(11) DEFAULT '0' NOT NULL,
    review_date int(11) DEFAULT '0' NOT NULL,
    score int(11) DEFAULT '0' NOT NULL,
    positive_comment text,
    negative_comment text,
    recommendation tinyint(4) DEFAULT '0' NOT NULL,
    image text,

    PRIMARY KEY (uid),
    KEY parent (pid)
);
