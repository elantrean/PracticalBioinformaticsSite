# PracticalBioinformaticsSite

> **总体设想：**
> 
> - Homework （HW） 1、2构成了这学期要完成的一个完整项目， 即：通过对多组学数据的整合分析来回答你感兴趣的生物学问题。比如“在精子发生中转录因子如何通过调控染色质结构和基因表达来进一步调控减数分裂的进程？”
这个项目的主要目标是建立一个由后台数据库驱动的网站，能够来查询和展示所存储的你感兴趣的基因家族的功能和多组学信息。
我们鼓励同学间的合作和互相学习。因此，由1-3个成员构成的小组来共同完成一个项目，同一组内每个人的得分相同。

**HW1的具体要求：**

- [x] 你必须建立项目网站。
- [x] 你必须建立后台数据库，并且利用数据库的数据驱动网站内容的动态更新。
- [x] 你必须用一个后台或网页版的php或R程序进行数据库的内容更新。
- [x] 你必须提供一个查询数据库的网页。
- [x] 你必须介绍：数据来源、数据有多少条记录、来自哪些物种。
- [x] 在网站上提供利用 blast 查询序列数据；
- [x] 对查询出来的数据提供更新和删除功能；
- [ ] 找到一个你选择的某一类基因（蛋白质）的一个 RNA-seq 表达数据集，利用所学的技 能计算出表达值并存储到数据库里；
- [ ] 在查询出某个基因（蛋白质）后，利用其表达数据动态做出表达图（plot）。

# Documentation
## About
This is a website designed for some basic bioinformatics operation navigation and integration. Access: [cdoveDB](http://123.57.174.100/students/202228011215031/cdoveDB/index.html)
## Documentation
### 1. Blast
The main page "Blast" is designed for web-based blast, which can display the html format blast result below. The options, program, database and query, can be selected in the form. In brief, this function is achieved by fetch method in `javascript`. We first made a post and after parse out the RID of this run, we check out if the Blast website is finished every 5 second. When website told the searching is ready, we fetch the final result.
### 2. Data operate
The second page "Database" is designed for The insertion and deletion of data is realized by `php` in background. For coding convenience, we only support the operation of one database called gene_table. This database is previously initialized with the data from hg38.ensembl.gtf. The only contained data is ENSG id, start, end, chromosome and direction.
### 3. Search
The third page "Search "can search for one query and display in below, it allows you to search this result in further NCBI and Ensembl website.
### 4. Documentation
This page
