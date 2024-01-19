<?php

declare(strict_types = 1);

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
{
    try {
        // TODO: prepare the database connection
        $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $databaseManager->connect();

        // TODO: fetch all articles as $rawArticles (as a simple array)
        $query = 'SELECT title, description, publish_date FROM articles';
        $statement = $databaseManager->connection->query($query);

        $rawArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    } catch (PDOException $error) {
        echo 'Error: ' . $error->getMessage();
        return [];
    }
}

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}