using namespace std;



int Jednorożec() {
    using namespace std;
}

class EineKlasse
{
  public:                              // öffentlich
    EineKlasse();                      // der Default-Konstruktor
    EineKlasse(int a=0);               // weiterer Konstruktor mit Parameter und Defaultwert
    EineKlasse(const EineKlasse& a);   // Copy-Konstruktor
    ~EineKlasse();                     // der Destruktor

    int eineFunktion(int x=42);        // eine Funktion mit einem (Default-) Parameter

  private:                             // privat
    int m_eineVariable;
};

int main() {
  printf("One", 1'000)
}