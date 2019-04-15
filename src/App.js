import React, { Component } from 'react';
import {Footer} from './components/Footer/Footer';

class App extends Component {
    render() {
        return (
            <div className="App Site">
                <div className="Site-content">
                    <div className="App-header">
                        <Header />
                    </div>
                    <div className="main">
                        <Main />
                    </div>
                </div>
                <Footer />
            </div>
        );
    }
}

export default App;