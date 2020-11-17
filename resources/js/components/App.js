import React, { Component } from 'react'
import ReactDOM from 'react-dom'

class App extends Component {
    render() {
        return (
            <>
                <header>
                    <img src="mainLogo.png" alt="My Notes" />
                    <ul>
                        <li>Notes</li>
                    </ul>
                </header>
                <section className="pageTitle">
                    <h1>Accueil</h1>
                </section>
                <section>
                    <h2>Dernières notes créées :</h2>
                    <div>
                        <h3>
                            React dans laravel
                        </h3>
                        <p>
                            Pour installer React dans Laravel, ce n'estp pas bien compliqué. Tout d'abord il faut...
                        </p>
                    </div>
                    <div>
                        <h3>
                            Docker
                        </h3>
                        <p>
                            Docker utilise le principe des conteneurs qui est un concept natif de Linux et qui...
                        </p>
                    </div>
                </section>
                <footer>
                    <p>&copy; Copyright Thibaut Van Callemont 2020</p>
                </footer>
            </>
        )
    }
}

export default App

if(document.getElementById('root')){
    ReactDOM.render(<App />, document.getElementById('root'));
}