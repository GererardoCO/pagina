using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace User_registration
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _id;
        protected string _full_name;
        protected string _username;
        protected string _email;
        protected string _password;
        protected unknown _created_at;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string full_name, string username, string email, string password, unknown created_at)
        {
            this._full_name=full_name;
            this._username=username;
            this._email=email;
            this._password=password;
            this._created_at=created_at;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Full_name
        {
            get {return _full_name;}
            set {_full_name=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        #endregion
    }
    #endregion
}