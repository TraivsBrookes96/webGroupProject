<?php
	class TableGenerator {
		public $headings;
		public $columnTypes;
		public $style;
		public $rows = [];

		//Set top row of values for the table
		public function setHeadings($headings) {
			$this->headings = $headings;
		}

		//Select whether all other row columns are headers or not
		public function setColumnTypes($types) {
			$this->columnTypes = $types;
		}

		//Set the style for the table
		public function setStyle($style) {
			$this->style = $style;
		}

		//Insert a row of data to the table
		public function addRow($row) {
			$this->rows[] = $row;
		}

		//Generate the table
		public function getHTML() {
			$result = '<table class="' . $this->style . '">';
			$result = $result . '<thead>';
			$result = $result . '<tr>';

			//Create headings
			foreach ($this->headings as $heading) {
				$result = $result . '<th>' . $heading . '</th>';
			}

			$result = $result . '</tr>';
			$result = $result . '</thead>';
			$result = $result . '<tbody>';

			//Add rows
			foreach ($this->rows as $row) {
				$result = $result . '<tr>';
				foreach ($row as $cell) {

					//Set row types
					$rowType = current($this->columnTypes);
					if(!next($this->columnTypes))
						reset ($this->columnTypes);

					$result = $result . '<' . $rowType . '>' . $cell . '</' . $rowType . '>';
				}
				$result = $result . '</tr>';
			}

			$result = $result . '</tbody>';
			$result = $result . '</table>';
			//Return fully formed table
			return $result;
		}
	}
?>
