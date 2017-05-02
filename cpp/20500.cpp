class A {
private:
  int x;
public:
  A(int _x) {
	  x = _x;
  }
  A operator+(A &a) {
	  x++;
	  return *this;
  }
  A operator*(int c) {
	  x *= c;
	  return *this;
  }
  int get_value() {
	  return x;
  }
};

int main() {
	A a = A(1);
	return 0;
}