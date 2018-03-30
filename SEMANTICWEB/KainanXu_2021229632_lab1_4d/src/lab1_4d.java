import java.io.*;
import org.apache.jena.query.Dataset;
import org.apache.jena.query.ReadWrite;
import org.apache.jena.rdf.model.*;
import org.apache.jena.tdb.TDBFactory;
import org.apache.jena.util.FileManager;
import org.apache.jena.vocabulary.*;

public class lab1_4d extends Object {
    public static void main (String args[]) {
    	// initialize log4j
    	org.apache.log4j.Logger.getRootLogger(). setLevel(org.apache.log4j.Level.OFF); 
    	
    	//some definitions
    	String defaultNameSpace = "http://www.w3.org/1999/02/22-rdf-syntax-ns";
    	String personURI    = "http://utdallas/semclass";
        String givenName    = "Keven";
        String middleNmae = "L.";
    	String familyName   = "Ates";
        String fullName     = givenName + " " + middleNmae + familyName;
        String BDAY = 	"1901-01-01";
        String EMAIL = "atescomp@utdallas.edu"; 
        String TITLE = "Senior Lecturer";           
        String directory = "MyDatabases/Dataset1";
        
        //using TDB persistence model
        Dataset dataset = TDBFactory.createDataset(directory);
        System.out.println("Load my FOAF Friends...");

        dataset.begin(ReadWrite.WRITE);
        try
        {
            //using a named graph called "myrdf" instead of in-memory model or un-named model
        	//Model model = dataset.getDefaultModel();
        	Model model = dataset.getNamedModel("myrdf");
        	
        	//Using vCard RDF to represent some info. about Dr.Keven L. Ates 
        	Resource KevenAtes 
        	= model.createResource(personURI)
        			.addProperty(VCARD.FN, fullName)
        			.addProperty(VCARD.BDAY,BDAY)
        			.addProperty(VCARD.EMAIL, EMAIL)
        			.addProperty(VCARD.TITLE,TITLE);
        	dataset.commit();
        	
        	//import my FOAF profile
        	InputStream inFile = FileManager.get().open("Kainan_FOAFFriends.rdf");
        	model.read(inFile, defaultNameSpace);
        	
        	//output files in XML, N-TRIPLES and N3 formats
        	//XML
        	try(FileOutputStream file = new FileOutputStream("Lab1_4_K XU.xml"))
        	{
        		model.write(file, "RDF/XML");
        		file.close();
        	}
        	catch(IOException e)
        	{
        		System.out.println("ERROR:"+e.toString());
        	}
        	
        	//N-TRIPLES
        	try(FileOutputStream file = new FileOutputStream("Lab1_4_K XU.ntp"))
        	{
        		model.write(file, "N-TRIPLES");
        		file.close();
        	}
        	catch(IOException e)
        	{
        		System.out.println("ERROR:"+e.toString());
        	}
        	
        	//N3
        	try(FileOutputStream file = new FileOutputStream("Lab1_4_K XU.n3"))
        	{
        		model.write(file, "N3");
        		file.close();
        	}
        	catch(IOException e)
        	{
        		System.out.println("ERROR:"+e.toString());
        	}
        	
        	model.write(System.out);
    		System.out.println("files gernerated, all works done!\n");
        }
		finally
		{
			dataset.end();
		}
    }
}