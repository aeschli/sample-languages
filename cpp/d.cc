template <typename T>
struct bar{
    int operator()(char x){
        return 0;
    }
};

struct foo:public bar<int>{
    using bar<int>::operator();
};

int foo = 100'000;