<?php
// Simple database for Replit (no setup needed)
class SimpleDB {
    private static $data = [
        'news_articles' => [],
        'news_comments' => []
    ];

    public static function getAll($table) {
        return array_values(self::$data[$table]);
    }

    public static function getById($table, $id) {
        return self::$data[$table][$id] ?? null;
    }

    public static function create($table, $item) {
        $id = uniqid();
        self::$data[$table][$id] = array_merge(['id' => $id], $item);
        return $id;
    }

    public static function addSampleData() {
        if (empty(self::$data['news_articles'])) {
            self::$data['news_articles']['art1'] = [
                'id' => 'art1',
                'title' => 'UOB Shines in Sixth Arab Youth Leaders Training Program',
                'content' => 'UOB Excellent Participation in Sixth Training Program for Preparing Arab Youth Leaders...',
                'category' => 'achievements',
                'image_path' => '../photos/Training Program .png',
                'is_recommended' => true,
                'author' => 'University of Bahrain',
                'publish_date' => '2025-03-16'
            ];
        }
    }
}

// Initialize with sample data
SimpleDB::addSampleData();
?>