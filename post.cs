using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tugasakhiruts
{
    #region Post
    public class Post
    {
        #region Member Variables
        protected int _postID;
        protected int _userID;
        protected string _content;
        #endregion
        #region Constructors
        public Post() { }
        public Post(int userID, string content)
        {
            this._userID=userID;
            this._content=content;
        }
        #endregion
        #region Public Properties
        public virtual int PostID
        {
            get {return _postID;}
            set {_postID=value;}
        }
        public virtual int UserID
        {
            get {return _userID;}
            set {_userID=value;}
        }
        public virtual string Content
        {
            get {return _content;}
            set {_content=value;}
        }
        #endregion
    }
    #endregion
}