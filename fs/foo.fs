open System.Windows.Forms
open System.Drawing
open Microsoft.FSharp.Core

let form = new Form(Text = "F# Windows Form",
                    Visible = true,
                    TopMost = true)

let initialState = 0

form.Click
|> Event.scan (fun state _ -> state + 1) initialState
|> Event.add (fun state -> form.Text <- state.ToString() )

// The declaration creates a constructor that takes two values, name and age.
type Person(name:string, age:int) =
    // A Person object's age can be changed. The mutable keyword in the
    // declaration makes that possible.
    let mutable internalAge = age

    // Declare a second constructor that takes only one argument, a name.
    // This constructor calls the constructor that requires two arguments,
    // sending 0 as the value for age.
    new(name:string) = Person(name, 0)

    // A read-only property.
    member this.Name = name
    // A read/write property.
    member this.Age
        with get() = internalAge
        and set(value) = internalAge <- value
let mutable (*samplesLabel*) : System.Windows.Forms.Label = null
    // Instance methods.
    // Increment the person's age.
(* member this.HasABirthday () = internalAge <- internalAge + 1 *)

    // Check current age against some threshold.
    member this.IsOfAge targetAge = internalAge >= targetAge

    // Display the person's name and age.
    override this.ToString () = 
        "Name:  " + name + "\n" + "Age:   " + (string)internalAge
		
let mutable (* samplesLabel *) : System.Windows.Forms.Label = null

