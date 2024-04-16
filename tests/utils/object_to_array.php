<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Utility for converting nested objects to arrays.
 *
 * @package   logstore_xapi
 * @copyright Milt Reder <milt@yetanalytics.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tests\utils;

/**
 * Given a deeply nested object representing JSON, make it an array
 *
 * @param \stdClass $data the object
 * @return array
 */
function objectToArray($data) {
    // If the data is an object, convert it to an array
    if ($data instanceof stdClass) {
        $data = (array) $data;
    }

    // If the data is an array, recursively apply the conversion
    if (is_array($data)) {
        return array_map('objectToArray', $data);
    }

    // Return the data unchanged if it is not an array or object
    return $data;
}
