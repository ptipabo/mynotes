import React, { Component } from 'react'
import ReactDOM from 'react-dom'

class App extends Component {
    render() {
        return (
            <div>
                Ceci est un test de composant REACT dans Laravel!
            </div>
        )
    }
}

export default App

if(document.getElementById('root')){
    ReactDOM.render(<App />, document.getElementById('root'));
}else{
    console.log('TEST');
}