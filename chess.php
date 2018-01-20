<?php
require 'vendor/autoload.php';

use App\Board\Board;

echo "
Welcome to console chess board! Available commands:
add <piece> <cell>
example - 'add bishop A1'

remove <cell>'
example - 'remove A1'

move <cell_from> <cell_to>
example - 'move A1 C3'
type 'exit' to end the game
" . PHP_EOL;

$board = new Board(new \App\Storage\FileStorage);
while (true) {
    $board->printState();

    $input = explode(' ', trim(fgets(STDIN, 1024)));

    if (in_array('add', $input)) {
        $board->add($input[1], $input[2]);
    }


    if (in_array('save', $input)) {
        $board->save();
    }

    if (in_array('load', $input)) {
        $board->load();
    }

    if (in_array('exit', $input)) {
        print 'Bye!' . PHP_EOL;
        break;
    }
}