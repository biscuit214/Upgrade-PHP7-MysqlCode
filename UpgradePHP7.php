<?php

class MysqlDB
{
    public static $mysqli;

    function DB($conn = null)
    {
        if (!empty($conn)) self::$mysqli = $conn;
        return self::$mysqli;
    }
}

define('MYSQL_ASSOC', MYSQLI_ASSOC);
define('MYSQL_NUM', MYSQLI_NUM);
define('MYSQL_BOTH', MYSQLI_BOTH);

if (!function_exists('mysql_connect')) {
    function mysql_connect($host, $user, $pass, $s = null)
    {
        return MysqlDB::DB(mysqli_connect($host, $user, $pass));
    }
}

if (!function_exists('mysql_affected_rows')) {
    function mysql_affected_rows($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysql_affected_rows($link);
    }
}

if (!function_exists('mysql_close')) {
    function mysql_close($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_close($link);
    }
}

if (!function_exists('mysql_query')) {
    function mysql_query($query, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_query($link, $query);
    }
}

if (!function_exists('mysql_select_db')) {
    function mysql_select_db($dbname, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_select_db($link, $dbname);
    }
}

if (!function_exists('mysql_stat')) {
    function mysql_stat($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_stat($link);
    }
}

if (!function_exists('mysql_thread_id')) {
    function mysql_thread_id($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_thread_id($link);
    }
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $type = MYSQLI_BOTH)
    {
        return mysqli_fetch_array($result, $type);
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result)
    {
        return mysqli_num_rows($result);
    }
}

if (!function_exists('mysql_fetch_lengths ')) {
    function mysql_fetch_lengths($result)
    {
        return mysqli_fetch_lengths($result);
    }
}

if (!function_exists('mysql_fetch_object')) {
    function smysql_fetch_object($result, $class_name = 'stdClass', array $params = null)
    {
        return mysqli_fetch_object($result, $class_name, $params);
    }
}

if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($string, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_real_escape_string($link, $string);
    }
}

if (!function_exists('mysql_escape_string')) {
    function mysql_escape_string($item)
    {
        return mysqli_real_escape_string($item, 'string');
    }
}

if (!function_exists('mysql_errno')) {
    function mysql_errno($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_errno($link);
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_error($link);
    }
}

if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result)
    {
        return mysqli_fetch_assoc($result);
    }
}

if (!function_exists('mysql_fetch_field')) {
    function mysql_fetch_field($result, $field_offset = 0)
    {
        if ($field_offset < 1)
            return mysqli_fetch_field($result);
        else {
            for ($x = 0; $x < $field_offset; $x++)
                mysqli_fetch_field($result);

            return mysqli_fetch_field($result);
        }
    }
}

if (!function_exists('mysql_fetch_row')) {
    function mysql_fetch_row($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_fetch_row($link);
    }
}

if (!function_exists('mysql_field_len')) {
    function mysql_field_len($result, $i)
    {
        return mysqli_fetch_field_direct($result, $i)->length;
    }
}

if (!function_exists('mysql_field_name')) {
    function mysql_field_name($result, $i)
    {
        return mysqli_fetch_field_direct($result, $i)->name;
    }
}

if (!function_exists('mysql_field_table')) {
    function mysql_field_table($result, $i)
    {
        return mysqli_fetch_field_direct($result, $i)->table;
    }
}

if (!function_exists('mysql_insert_id')) {
    function mysql_insert_id($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_insert_id($link);
    }
}

if (!function_exists('mysql_free_result')) {
    function mysql_free_result($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_free_result($link);
    }
}

if (!function_exists('mysql_client_encoding')) {
    function mysql_client_encoding($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_character_set_name($link);
    }
}

if (!function_exists('mysql_set_charset')) {
    function mysql_set_charset($charset, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_set_charset($link, $charset);
    }
}

if (!function_exists('mysql_list_processes')) {
    function mysql_list_processes($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_thread_id($link);
    }
}

if (!function_exists('mysql_list_tables')) {
    function mysql_list_tables($DatabaseName, $link = null)
    {
        $tables = array();
        $result = mysqli_query(MysqlDB::DB(), "SHOW TABLES FROM {$DatabaseName};");
        if ($result)
            while ($table = mysql_fetch_row($result))
                $tables[] = $table[0];
        return $tables;
    }
}

if (!function_exists('mysql_num_fields')) {
    function mysql_num_fields($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_field_count($link);
    }
}

if (!function_exists('mysql_info')) {
    function mysql_info($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_info($link);
    }
}

if (!function_exists('mysql_create_db')) {
    function mysql_create_db($DatabaseName, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return (mysqli_query($link, 'CREATE DATABASE ' . $DatabaseName)) ? TRUE : FALSE;
    }
}

if (!function_exists('mysql_createdb')) {
    function mysql_createdb($DatabaseName, $link = null)
    {
        return mysql_create_db($DatabaseName, $link);
    }
}

if (!function_exists('mysql_drop_db')) {
    function mysql_drop_db($DatabaseName, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return (mysqli_query($link, 'DROP DATABASE ' . $DatabaseName)) ? TRUE : FALSE;
    }
}

if (!function_exists('mysql_dropdb')) {
    function mysql_dropdb($DatabaseName, $link = null)
    {
        return mysql_drop_db($DatabaseName, $link);
    }
}

if (!function_exists('mysql_list_dbs')) {
    function mysql_list_dbs($link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_query($link, 'SHOW DATABASES');
    }
}

if (!function_exists('mysql_list_fields')) {
    function mysql_list_fields($database_name, $table_name, $link = null)
    {
        if (null === $link) $link = MysqlDB::DB();
        return mysqli_query($link, 'SHOW COLUMNS FROM ' . $table_name);
    }
}

if (!function_exists('mysql_db_name')) {
    function mysql_db_name($result, $row)
    {
        mysqli_data_seek($result, $row);
        $fetch = mysqli_fetch_row($result);
        return $fetch[0];
    }
}

if (!function_exists('mysql_db_query')) {
    function mysql_db_query($database, $query)
    {
        mysqli_select_db($database);
        return mysqli_query(MysqlDB::DB(), $query);
    }
}

if (!function_exists('mysql_data_seek')) {
    function mysql_data_seek($data, $row)
    {
        return mysqli_data_seek($data, $row);
    }
}

if (!function_exists('mysql_field_seek')) {
    function dmysql_field_seek($result, $field)
    {
        return mysqli_field_seek($result, $field);
    }
}

if (!function_exists('mysql_result')) {
    function mysql_result($res, $row = 0, $col = 0)
    {
        $numrows = mysqli_num_rows($res);
        if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
            mysqli_data_seek($res, $row);
            $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
            if (isset($resrow[$col])) {
                return $resrow[$col];
            }
        }
        return false;
    }
}

if (!function_exists('mysqli_result')) {
    function mysqli_result($res, $row = 0, $col = 0)
    {
        return mysql_result($res, $row, $col);
    }
}

if (!function_exists('split')) {
    function split($pattern, $string, $limit = -1)
    {
        return explode($pattern, $string, $limit);
    }
}
