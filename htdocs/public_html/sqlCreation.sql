--MySql script for database creation and implementation

CREATE TABLE application(
	id	int 	NOT NULL AUTO_INCREMENT,
	reason1 varchar(2047) NOT NULL,
	reason2 varchar(2047) NOT NULL,
	reason3 varchar(2047) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO applications(reason1, reason2, reason3)
VALUES('<div>I have a great understanding of building relationships with customers. This comes from work at my current work, where we strive to create relationships between lenders and borrowers.</div>','<div>I want to learn from new challenges in a place that harbors growth from its employees. BHHC seems an ideal place to thrive, in a new environment that will provide challenges to help me grow as I create great applications that make a difference in the world.</div>','<div>I can make sophisticated calculators that run extremely fast on host machines! Example included and more advanced version found <a href="https://www.magillaloans.com/loans/calculators/affordability-calculator/">here</a>.</div>')