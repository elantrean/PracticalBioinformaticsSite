## About
This is a website designed for some basic bioinformatics operation navigation and integration.
## Documentation
### 1. Blast
The main page "Blast" is designed for web-based blast, which can display the html format blast result below. The options, program, database and query, can be selected in the form. In brief, this function is achieved by fetch method in `javascript`. We first made a post and after parse out the RID of this run, we check out if the Blast website is finished every 5 second. When website told the searching is ready, we fetch the final result.
### 2. Data operate
The second page "Database" is designed for The insertion and deletion of data is realized by `php` in background. For coding convenience, we only support the operation of one database called gene_table. This database is previously initialized with the data from hg38.ensembl.gtf. The only contained data is ENSG id, start, end, chromosome and direction.
### 3. Search
The third page "Search "can search for one query and display in below, it allows you to search this result in further NCBI and Ensembl website.
### 4. Documentation
This page