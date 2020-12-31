import React,{useState,useEffect} from 'react';
import axios from 'axios';
import Card from '../components/Card';
import data from "../apis/data";
import io from 'socket.io-client';
const Socket = io('https://owaisazamtechnical.herokuapp.com');



const Main = (Props) => {
    let url = Props.url ;
    const [obj,setojb] = useState([{}]);
 
    useEffect(() => {
        num(Props.id);
        Socket.on('message',(msg) => {
            num(Props.id);
            
        });
     
      },[]);

    //Get all
      const  num = (event) => {
      axios.get(`${url}/admin/complians/client/${Props.id}`)
      .then( (result) => { setojb(result.data);   } );
      }

    //Send
    const  send = (event) => {
        if (event.key === 'Enter') {
            axios.post(`${url}/admin/complains/client`,{
                      message:event.target.value,
                      id:Props.id
                   }).then( (res) => { 
                       
                    let dd = {
                        username:Props.name,
                        message:'hi',
                    }

                    Socket.emit('message',dd);
                    // num(); 
                
                });
                 event.target.value = ''; }
        }
      
    
    //   num();
    //  setInterval(num,2000);
     
    return ( 
              <div className="chat">
                   <div className="chat-header clearfix">
                   <img src={Props.img} alt="avatar" />
                     <div className="chat-about">
                            <div className="chat-with">{Props.name}</div>
                        <div className="d-none chat-num-messages">2 new messages</div>
                     </div>
               </div>                   
                   <div className="chat-history" id="chat-conversation">
                        <ul>
                            {      obj.map((val,i,arr) => {
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
                                <input onKeyDown={send} defaultValue="" type="text" className="form-control" placeholder="Enter text here.." />
                            </div>
                         </div>
                    </div>
                </div>    
                 );
}

export default Main;