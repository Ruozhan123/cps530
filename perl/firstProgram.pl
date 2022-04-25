#!/usr/bin/perl
use strict;
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 

my $query = CGI->new;
my $html_code;

print $query->header;

print $html_code = <<END_HTML;
<html>
  <head>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto">
    <style>
      body {
        font-family: 'Roboto', sans-serif;
        font-size: 48px;
        text-align: center;
        color : #007ced;
      }
    </style>
  </head>
  <body>
    <div>This is my first Perl program</div>
  </body>
</html>
END_HTML

