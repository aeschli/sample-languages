#include <iostream>

#define BLAH 0

// a comment

class Foo {
	public:
		Foo() {}
}

namespace space {
	int do_stuff( bool flag ) {
		if ( flag ) {
			return 5;
		} else {
			return BLAH;
		}
	}
}

int main() {
	return space::do_stuff( false );
}