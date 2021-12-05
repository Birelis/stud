<?php
class Group {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getGroupList() {
        $this->db->query('SELECT * FROM groups');

        return $this->db->resultSet();
    }

    public function setGroup($data) {

        $this->db->query('INSERT INTO groups (Name) values(:Name)');

        $this->db->bind(':Name', $data['Name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteGroup($groupId) {
        $this->db->query('DELETE FROM groups WHERE GroupId = :groupId');
        $this->db->bind(':groupId', $groupId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}