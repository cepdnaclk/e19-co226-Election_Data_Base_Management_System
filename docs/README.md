# Data_Base_Project
**
Building a Database For saving datas related to election.**,

**Election**

We took Election as our source of our database. We all know about the amount of data flow in an election period is huge. Therefore, with the proper database system, the flow of the data can be managed easily and without error. Providing a window of opportunity of error in an election is very crucial. Therefore, the attention and care have to be put in it unimaginable. A proper database for an election will have some certain fundamental entities and some fields. Such as:
1.	Candidate:
•	ID (primary key)
•	Name
•	Political party
•	Photo
•	Position

2.	Voter:
•	ID (primary key)
•	Name
•	Address
•	Date of birth
•	Voter ID number

3.	Polling Station:
•	ID (primary key)
•	Name
•	Address
•	Person in charge name
•	Person in charge phone number

4.	Vote:
•	ID (primary key)
•	Candidate ID (foreign key to candidate entity)
•	Voter ID (foreign key to voter entity)
•	Polling Station ID (foreign key to polling station entity)
•	Vote timestamp

5.	Election:
•	ID (primary key)
•	Name
•	Start date
•	End date
•	Description

6.	Political Party:
•	ID (primary key)
•	Name
•	Logo 

When it is comes to a database related to election, there are several entities to be considered. However, the few that has given above are the most and essential entities of the database. 
Each entities are related to other in so many ways. A field in an entity might be a primary key in other entity. Like this other fields might linked with other entity. The relationship between the objects that are given as follow:
	Candidate and vote entities are linked in one to many relation. A candidate can have many votes but a vote cannot have many candidate.
	Voter and vote are also connected with one to many relation. A voter is allowed to make more than one vote but each vote has to be made by one voter.
	A polling station can have many votes but those votes has to be made in one polling station. Therefore, they have one to many relation between them.
	An election can have many candidates but each candidate can be compete in a single election at a time. They also related with one to many relation.
	A candidate can be associated with only one party while a party can have many candidates as it can. So they also have one to many relation between them.
With these basic entities, it is easy to keep track in every detail of the ongoing election. In addition, it will make our work thousand time easier than before. The amount of resource needed for it far much lesser than the one we used before. Moreover, the possibility of an error occurring is less.

Thank You

