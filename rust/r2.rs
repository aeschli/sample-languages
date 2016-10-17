impl Foo<A,B>
    where ...
{ }

impl Foo<A,B> for C
    where ...
{ }

impl Foo<A,B> for C
{
    fn foo<A,B> -> C
        where ...
    { }
}

fn foo<A,B> -> C
    where ...
{ }

struct Foo<A,B>
    where ...
{ }

trait Foo<A,B> : C
    where ...
{ }