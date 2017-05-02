sub parse_name {
    my ($f, $m, $l, $s) = (undef, undef, undef, undef);
    {
        my $x = $_[0];
        last unless defined $x;
        $x =~ s/\s*(['\-])\s*/$1/g;
        my @p = grep /^./, split /[^[:alpha:]'\-]/i, $x;
        last unless scalar @p;
        $s = pop @p if $p[$#p] =~ /^(I|II|III|IV|V|Jr|Sr)$/i;
        last if scalar @p == 0;
        $f = $p[0], last if scalar @p == 1;
        my $mp;
        for (my $i = $#p - 1; $i >= 0; $i--) {
            $mp = $i, last if length $p[$i] == 1;
        }
        if (!defined $mp) {
            ($f, $l) = ($p[0], (join ' ', @p[1 .. $#p]));
        }
        elsif ($mp == 0) {
            if (scalar @p > 2) {
                ($f, $m, $l) = ($p[0], $p[1], (join ' ', @p[2 .. $#p]));
            }
            else {
                ($f, $l) = @p;
            }
        }
        else {
            ($f, $m, $l) = ((join ' ', @p[0 .. $mp - 1]), $p[$mp], (join ' ', @p[$mp + 1 .. $#p]));
        }
    }
    ($f, $m, $l, $s);
}