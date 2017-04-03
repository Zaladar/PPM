/*
 *inputhandler.c will read a string from a text file, and format it so that the sign can use it.
 *Finally it will send the formatted data to a program responsible for the wireless transmission.
 *Author: Jonas Iacobi
*/
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
#include <string.h>

#define MAXMSGLENGTH 500
#define SPLITKEY '|'
#define FILENAME "C:/Users/iacob/Desktop/msg.txt"

/*
 * The getMessage function reads from the file specified and puts the content in msg.
 * The specified file should contain nothing but text. Returns a reference to the changed string.
*/
char* getMessage(char* filename, char* msg){
  int   fileLength, msgLength;
  char* tempMsg = ((char*) malloc(sizeof(char) * MAXMSGLENGTH+1));
  FILE *fp = fopen( filename, "r");

  if(fp){
    //Find end of text file, find file size, and go back to beginning of file.
    fseek(fp, 0, SEEK_END);
    fileLength = ftell(fp);
    fseek(fp, SEEK_SET, 0);

    //Read the entire file pointed to by fp to the string tempMsg.
    //Find the first character matching splitkey and save the pointer to it in endp.
    fread(tempMsg, sizeof(char), fileLength, fp);
    char* endp = strchr(tempMsg, SPLITKEY);

    if(endp != NULL) {
      //Calculate the difference between the pointers to the beginning of the string and the splitkey.
      //Copy the length of the first message to msg and add a terminator.
      msgLength = ((char*)endp - (char*)tempMsg);
      strncpy(msg, tempMsg, msgLength);
      msg[msgLength] = '\0';
      }
    else{
      return "Error: No terminating character found.";
      }

    //Free the memory allocated to tempMsg, and close the file.
    free(tempMsg);
    fclose(fp);

    return msg;
    }
  else{
    return "Error: Message file failed to open. Please contact the poor students who made this.";
    }
}



/*
 *The format function will take a string as argument and return it in a format that can be used
 *by the sign. Currently does nothing productive, but formatted is meant to temporarily contain
 *the formatted string before it's put back into char* string.
*/
char* format(char* string){
  char* formatted = ((char*) malloc(sizeof(char) * strlen(string)+1));
  formatted = strdup(string);
  free(formatted);
  return string;
  }



/*
 *The transmit function will be responsible for sending the string to the wireless transmitter.
 *Does nothing but print its argument for the moment. Might return an error code.
*/
int transmit(char* transmission){
  printf("Message to be transmitted: \n   %s", transmission);
  return 0;
  }



/*
 *Runs the functions getMessage, format, and transmit,
 *as well as initializing and cleaning up the required variables.
*/
int main(){
  //Allocate memory for the message string, the same array will be overwritten for subsequent messages.
  char* message = ((char*) malloc(sizeof(char) * MAXMSGLENGTH+1));

  //Call getMessage to read the content of filename into the string message
  transmit(format(getMessage(FILENAME, message)));

  //Free memory for the message string
  free(message);
  //Exit
  return 0;
}
