type endsWithDigit1 = number

class Repro {
  normalMember() : number {

    const someDeclaration : (name : string) => string = (name) => 'hello there ' + name
    const myString = someDeclaration('human')
    let coolNumber = myString.length + 20
    var anotherCoolThing = {
      pigs: 6,
      rabbits: 29,
      horseName: 'Johnny'
    }

    console.log('this is how the syntax highlighting should look!')

    return 1
  }

  badHighlightingMember() : endsWithDigit1 {

    const someDeclaration : (name : string) => string = (name) => 'hello there ' + name
    const myString = someDeclaration('human')
    let coolNumber = myString.length + 20
    var anotherCoolThing = {
      pigs: 6,
      rabbits: 29,
      horseName: 'Johnny'
    }

    console.log('this has some highlighting but the colors are wrong')

    return 1
  }
}