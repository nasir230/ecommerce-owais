import React from 'react';

export default class Example extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: null,
    };

    this.state.value = 'asdasd';
  }

  render() {
    return (
      <div className="shopping-list">
      <h1>Shopping List for {this.props.name}</h1>
      <ul>
        <li>Instagram</li>
        <li>WhatsApp</li>
        <li>Oculus</li>
        <button className="square" onClick={() => alert(this.state.value)}></button>
      </ul>
    </div>
    );
  }
}

