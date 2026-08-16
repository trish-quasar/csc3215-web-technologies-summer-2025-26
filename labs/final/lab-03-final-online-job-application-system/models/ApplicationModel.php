<?php

class ApplicationModel {

    public function getJobPositions() {
        return [
            "Software Developer",
            "Web Developer",
            "Database Administrator",
            "Network Engineer"
        ];
    }

    public function getAllowedFileTypes() {
        return [
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        ];
    }
}
