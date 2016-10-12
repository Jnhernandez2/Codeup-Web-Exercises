<?php

require_once '../../adlister-database-config.php';

abstract class Model
{
    /** @var PDO|null Connection to the database */
    protected static $dbc = null;

    /** @var array Database values for a single record. Array keys should be column names in the DB */
    protected $attributes = array();

    /**
     * Constructor
     *
     * An instance of a class derived from Model represents a single record in the database.
     *
     * $param array $attributes Optional array of database values to initialize the model record with
     */
    public function __construct(array $attributes = array())
    {
        self::dbConnect();

        $this->attributes = $attributes;

        // @TODO: Initialize the $attributes property with the passed value
    }

    /**
     * Connect to the DB
     *
     * This method should be called at the beginning of any function that needs to communicate with the database
     */
    protected static function dbConnect()
    {
        if (!self::$dbc) {
            // @TODO: Connect to database
            $dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            self::$dbc = $dbc;
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * Get a value from attributes based on its name
     *
     * @param string $name key for attributes array
     *
     * @return mixed|null value from the attributes array or null if it is undefined
     */
    public function __get($key)
    {
        // @TODO: Return the value from attributes for $name if it exists, else return null
        if (array_key_exists($this->attributes[$key], $this->attributes)) {
            return $key;
        }
    }

    /**
     * Set a new value for a key in attributes
     *
     * @param string $name  key for attributes array
     * @param mixed  $value value to be saved in attributes array
     */
    public function __set($key, $value)
    {
        // @TODO: Store name/value pair in attributes array
        $this->attributes[$key] = $value;
    }

    /** Store the object in the database */
    public function save()
    {
        // @TODO: Ensure there are values in the attributes array before attempting to save
        if (!empty($this->attributes)) {
            if (isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }

        // @TODO: Call the proper database method: if the `id` is set this is an update, else it is a insert
    }

    public function delete($id, $table)
    {
        //$deletion = self::find($id);
        self::dbConnect();

        $query = "DELETE FROM :table WHERE id = :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':table', $table, PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();

    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();
}
