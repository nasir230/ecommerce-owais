import React,{useState,useEffect} from 'react';
import axios from 'axios';
import Card from '../components/Card';
import io from 'socket.io-client';
const Socket = io('https://owaisazamtechnical.herokuapp.com');


const Main = (Props) => {
    let url = Props.url ;

    const [users,setusers] = useState([{}]);
    const [msgs,setMsg] = useState([]);
    const [user,setuser] = useState();

    useEffect(() => {

        // Socket.on('message',(msg) => {
        //     getchat(msg.message);
        //     // console.log(msg.message)
        // });

        axios.get(`${url}/admin/chat/getuser/all`)
            .then( (result) => { 
                 setusers(result.data); 
                getchat(result.data[0].id);
            });

      },[]);

       //Get all
      const  num = (event) => {
           let v = event.target.value;
            if(event.target.value == ''){
            v = 'all';
            }  
            axios.get(`${url}/admin/chat/getuser/${v}`)
            .then( (result) => { setusers(result.data) 
                console.log(result.data);
            });
        }

        const  send = (event) => {
            if (event.key === 'Enter') {
                axios.post(`${url}/admin/complains/admin`,{
                          message:event.target.value,
                          id:user
                       }).then( (res) => {  
                          
                        let dd = {
                            username:'Admin',
                            message:'hi',
                        }
                         Socket.emit('message',dd);

                       });
                     event.target.value = '';
                 }
            }

            //Get all
      const  getchat = (event) => {

        axios.get(`${url}/admin/complians/client/${event}`)
        .then( (result) => { setMsg(result.data); setuser(event)  } );

        }

  
    return (<div className="row">
            <div className="col-xl-12">
            <div className="card">
            <div className="header">
                <h2><strong>Chat</strong></h2>
            </div>
            <div className="card-body">
                <div className="row">
                    <div className="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div className="card">
                            <div className="body">
                                <div id="plist" className="people-list">
                                    <div className="form-line m-b-15">
                                     <input onChange={num}  defaultValue='' type="text" className="form-control" placeholder="Search..." />
                                    </div>
                                    <div className="tab-content">
                                        <div id="chat_user">
                                            <ul className="chat-list list-unstyled m-b-0">
                                            {
                                               users && users.map((val,i,arr) => {
                                                return <li onClick={() => getchat(val.id)} key={i} className="clearfix "><img  src={val.img}  />
                                                <div className="about">
                                                 <div className="name">{val.name}</div>
                                                 </div>
                                              </li>}) 
                                            }
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div className="card">
                            <div className="chat">
                               <div className="chat-header clearfix">
                                    <img src={Props.img} alt="avatar" />
                                    <div className="chat-about">
                                            <div className="chat-with">{Props.name}</div>
                                    </div>
                                </div>
                                <div className="chat-history" id="chat-conversation">
                                    <ul>
                                    { msgs.map((val,i,arr) => {
                                    if( val.is_admin == 0){
                                        return <li key={i} >
                                        <div className="message-data">
                                            <span className="message-data-name">{val.name} </span>
                                            <span className="message-data-time">10:12 AM, Today</span>
                                        </div>
                                        <div className="message my-message">
                                    <p>{val.message}</p>
                                        </div>
                                    </li>       
                                    } else {
                                      return <li key={i} className="  clearfix">
                                                <div className="message-data text-right">
                                                    <span className="message-data-time">10:10 AM, Today
                                                    </span>
                                                    &nbsp; &nbsp;
                                                    <span className="message-data-name">Admin</span>
                                                </div>
                                                <div className="message other-message float-right"> {val.message} </div>
                                            </li>
                                           }
                                       })
                                    }
                                    </ul>
                                </div>
                                <div className="chat-message clearfix">
                                    <div className="form-group">
                                        <div className="form-line">
                                            <input onKeyDown={send} type="text" className="form-control" placeholder="Enter text here.." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>);
}

export default Main;