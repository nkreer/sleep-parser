# Sleep as Android parser

["Sleep as Android" by urbandroid](https://sleep.urbandroid.org/) lets you export your sleep data in an unorganized and chaotic csv table. This script converts it to readable json for easier use with other applications or visualisation utilities. 

The code is well commented for easy adjustments. [Sleep as Android backup files are documented on urbandroid's site for reference.](https://docs.sleep.urbandroid.org/devs/csv.html)

Also, the script properly handles times/timezones and converts them to UTC unix timestamps for you.

Use it with PHP like this:

`php parser.php <input-file> [output-file]`