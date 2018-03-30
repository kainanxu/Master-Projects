-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-01 11:26:00
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `utd_course`
--

-- --------------------------------------------------------

--
-- 表的结构 `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `creater` varchar(60) DEFAULT NULL,
  `createrid` int(11) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `comment` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`appointmentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `title`, `creater`, `createrid`, `start`, `end`, `comment`) VALUES
(90, 'Test_1', 'TestAdmin', 4, '2016-08-20 15:00:00', '2016-08-20 17:00:00', 'test desrip\r\n    ');

-- --------------------------------------------------------

--
-- 表的结构 `appointment_student`
--

CREATE TABLE IF NOT EXISTS `appointment_student` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentid` int(11) NOT NULL,
  `advisor` varchar(60) NOT NULL,
  `advisor_userid` smallint(6) DEFAULT NULL,
  `appoinmentdate` datetime NOT NULL,
  `student_userid` smallint(6) DEFAULT NULL,
  `occupied` smallint(6) DEFAULT NULL,
  `student_name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- 转存表中的数据 `appointment_student`
--

INSERT INTO `appointment_student` (`period_id`, `appointmentid`, `advisor`, `advisor_userid`, `appoinmentdate`, `student_userid`, `occupied`, `student_name`) VALUES
(200, 90, 'TestAdmin', 4, '2016-08-20 15:30:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `core` smallint(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- 转存表中的数据 `courses`
--

INSERT INTO `courses` (`id`, `number`, `prefix`, `name`, `description`, `created_at`, `updated_at`, `core`) VALUES
(1, '5301', 'CS', 'Professional and Technical Communication', 'CS 5301 utilizes an integrated approach to writing and speaking for the technical professions.  The advanced writing components of the course focus on writing professional quality technical documents such as proposals, memos, abstracts, reports, letters, emails, etc.  The advanced oral communication components of the course focus on planning, developing, and delivering dynamic, informative and persuasive presentations.  Advanced skills in effective teamwork, leadership, listening, multimedia and computer generated visual aids are also emphasized.  Graduate students will have a successful communication experience working in a functional team environment using a real time, online learning environment.', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(2, '5303', 'CS', 'Computer Science I', 'Computer science problem solving.  The structure and nature of algorithms and their corresponding computer program implementation.  Programming in a high level block-structured language', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(3, '5330', 'CS', 'Computer Science II', 'Basic concepts of computer organization: Numbering systems, two''s complement notation, multi-level machine concepts, machine language, assembly programming and optimization, subroutine calls, addressing modes, code generation process, CPU datapath, pipelining, RISC, CISC, performance calculation.  Co-requisite: CS 5303.', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(4, '5333', 'CS', 'Discrete Structures', 'Mathematical foundations of computer science.  Logic, sets, relations, graphs and algebraic structures. Combinatorics and metrics for performance evaluation of algorithms.', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(5, '5336', 'CS', 'Programming Projects in Java', 'Overview of the object-oriented philosophy.  Implementation of object-oriented designs using the Java programming environment.  Emphasis on using the browser to access and extend the Java class library.  Prerequisite: CS 5303 or equivalent experience.', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(6, '5343', 'CS', 'Algorithm Analysis & Data Structures', 'Formal specifications and representation of lists, arrays, trees, graphs, multilinked structures, strings and recursive pattern structures.  Analysis of associated algorithms.  Sorting and searching, file structures.  Relational data models. Prerequisites: CS 5303, CS 5333.', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(7, '5348', 'CS', 'Operating Systems Concepts', 'Processes and threads. Concurrency issues including semaphores, monitors and deadlocks.  Simple memory management.  Virtual memory management.  CPU scheduling algorithms.  I/O management.  File management.  Introduction to distributed systems. Prerequisites: CS 5330 and CS 5343', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 0),
(8, '5349', 'CS', 'Automata Theory', 'Deterministic and nondeterministic finite automata; regular expressions, regular sets, context-free grammars, pushdown automata, context free languages.  Selected topics from Turing Machines and undecidability.  Prerequisite: CS 5333.', '2015-06-01 04:27:32', '2015-06-01 04:27:33', 0),
(9, '5354', 'CS', 'Software Engineering', 'Formal specification and program verification.  Software life-cycle models and their stages.  System and software requirements engineering; user-interface design. Software architecture, design, and analysis.  Software testing, validation, and quality assurance.  Corequisite: CS 5343', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(10, '5375', 'CS', 'Principles of UNIX', 'Design and history of the UNIX operating system.  Detailed study of process and file system data structures. Shell programming in UNIX.  Use of process-forking functionality of UNIX to simplify complex problems.  Interprocess communication and coordination. Device drivers and streams as interfaces to hardware features.  TCP/IP and other UNIX inter-machine communication facilities.  Prerequisite: CS 3335.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(11, '5390', 'CS', 'Computer Networks', 'The design and analysis of protocols for computer networking.  Topics include: network protocol design and composition via layering, contention resolution in multi-access networks, routing metrics and optimal path searching, traffic management, global network protocols; dealing with heterogeneity and scalability.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(12, '5V71', 'CS', 'Cooperative Education', 'Placement in a faculty-supervised work environment in industry or government.  Sites may be local or out-of-state.  The cooperative education program provides exposure to a professional working environment, application of theory to working realities, and an opportunity to test skills and clarify goals.  Experience gained may also serve as a work credential after graduation.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(13, '5V81', 'CS', 'Special Topics in Computer Science', 'Selected topics in Computer Science.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(14, '6301', 'CS', 'Special Topics in Computer Science', 'Topics will vary.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(15, '6304', 'CS', 'Computer Architecture', 'Trends in processor, memory, I/O and system design.  Techniques for quantitative analysis and evaluation of computer systems to understand and compare alternative design choices in system design.  Components in high performance processors in computers: pipelining, instruction level parallelism, memory hierarchies, and input/output.  Students will undertake a major computing system analysis and design project.  Prerequisite: CS 3340, CS 4341 and C/C ++.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(16, '6320', 'CS', 'Natural Language Processing', 'This course covers state-of-the-art methods for natural language processing.  After an introduction to the basics of syntax, semantic, and discourse analysis, the focus shifts to the integration of these modules into natural-language processing systems.  In addition to natural language understanding, the course presents advanced material on lexical knowledge acquisition, natural language generation, machine translation, and parallel processing of natural language. Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(17, '6321', 'CS', 'Discourse Processing', 'Introduction to discourse processing from natural language texts.  Automatic clustering of utterances into coherent units', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(18, '6322', 'CS', 'Information Retrieval', 'This course covers modern techniques for storing and retrieving unformatted textual data and providing answers to natural language queries.  Current research topics and applications of information retrieval in data mining, data warehousing, text mining, digital libraries, hypertext, multimedia data, and query processing are also presented.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(19, '6324', 'CS', 'Information Security', 'A comprehensive study of security vulnerabilities in information systems and the basic techniques for developing secure applications and practicing safe computing. Topics include common attacking techniques such as buffer overflow, Trojan, virus, etc.  UNIX, Windows and Java security.  Conventional encryption. Hashing functions and data integrity.  Public-key encryption', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(20, '6325', 'CS', 'Introduction to Bioinformatics', 'The course provides a broad overview of the bioinformatics field.  Comprehensive introduction to molecular biology and molecular genetics for a program of study in bioinformatics.  Discussion of elementary computer algorithms in biology', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(21, '6333', 'CS', 'Algorithms in Computational Biology', 'The principles of algorithm design for biological datasets, and analysis of influential problems and techniques.  Biological sequence analysis, gene finding, RNA folding, protein folding, sequence alignment, genome assembly, comparative genomics, phylogenetics, clustering algorithms.  Prerequisite: CS 6325.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(22, '6348', 'CS', 'Data and Applications Security', 'The course will teach principles, technologies, tools and trends for data and applications security. Topics to be covered include: confidentiality, privacy and trust management; secure databases; secure distributed systems; secure multimedia and object systems; secure data warehouses; data mining for security applications; assured information sharing; secure knowledge management; secure collaboration; secure digital libraries; trustworthy semantic web; biometrics; digital forensics; secure e-commerce; secure sensor information management and secure social networks. Students will take one system or application and develop a secure version of that system or application for the programming project. Prerequisite: CS 5343', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(23, '6349', 'CS', 'Network Security', 'This course covers theoretical and practical aspects of network security. The topics include use of cryptography for building secure communication protocols and authentication systems; security handshake pitfalls, Kerberos and PKI, security of TCP/IP protocols including IPsec, BGP security, VPNs, IDSes, firewalls, and anonymous routing; security of TCP/IP applications; wireless LAN security; denial-of-service defense. Students are required to do a programming project building a distributed application with certain secure communication features and required to participate in several network security lab exercises and cyber war games. Prerequisite: CS 5390', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(24, '6352', 'CS', 'Performance of Computer Systems and Networks', 'Overview of case studies.  Quick review of principles of probability theory.  Queuing models and physical origin of random variables used in queuing models.  Various important cases of the M/M/m/N queuing system. Little''s law.  The M/G/1 queuing system.  Simulation of queuing systems. Product form solutions of open and closed queuing networks.  Convolution algorithms and Mean Value Analysis for closed queuing networks.  Discrete time queuing systems.  Prerequisite: a first course on probability theory.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 2),
(25, '6353', 'CS', 'Compiler Construction', 'Lexical analyzers, context-free grammars.  Top-down and bottom-up parsing; shift reduce and LR parsing.  Operator-precedence, recursive-descent, predictive, and LL parsing. LR', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(26, '6354', 'CS', 'Advanced Software Engineering', 'This course covers advanced theoretical concepts in software engineering and provides an extensive hands-on experience in dealing with various issues of software development.  It involves a semester-long group software development project spanning software project planning and management, analysis of requirements, construction of software architecture and design, implementation, and quality assessment.  The course will introduce formal specification, component-based software engineering, and software maintenance and evolution.  Prerequisites: CE/CS/SE 5354', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(27, '6356', 'CS', 'Software Maintenance, Evolution, and Re-Engineering', 'Principles and techniques of software maintenance.  Impact of software development process on software justifiability, maintainability, evolvability, and planning of release cycles.  Use of very high-level languages and dependencies for forward engineering and reverse engineering. Achievements, pitfalls, and trends in software reuse, reverse engineering, and re-engineering.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(28, '6359', 'CS', 'Object-Oriented Analysis and Design', 'Analysis and practice of modern tools and concepts that can help produce software that is tolerant of change.  Consideration of the primary tools of encapsulation and inheritance.  Construction of software-ICs which show the parallel with hardware construction.  Prerequisites: CE/CS/SE 5354 and either CS 3335 or CS 5336.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(29, '6360', 'CS', 'Database Design', 'Methods, principles, and concepts that are relevant to the practice of database software design. Database system architecture; conceptual database models; relational and object-oriented databases; database system implementation; query processing and optimization; transaction processing concepts, concurrency, and recovery; security.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 1),
(30, '6361', 'CS', 'Advanced Requirements Engineering', 'System and software requirements engineering.  Identification, elicitation, modeling, analysis, specification, management, and evolution of functional and non-functional requirements.  Strengths and weaknesses of different techniques, tools, and object-oriented methodologies.  Interactions and trade-offs among hardware, software, and organization.  System and sub-system integration with software and organization as components of complex, composite systems.  Transition from requirements to design.  Critical issues in requirements engineering.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(31, '6362', 'CS', 'Advanced Software Architecture and Design', 'Concepts and methodologies for the development, evolution, and reuse of software architecture and design, with an emphasis on object-orientation. Identification, analysis, and synthesis of system data, process, communication, and control components.  Decomposition, assignment, and composition of functionality to design elements and connectors.  Use of non-functional requirements for analyzing trade-offs and selecting among design alternatives.  Transition from requirements to software architecture, design, and to implementation.  State of the practice and art.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(32, '6363', 'CS', 'Design and Analysis of Computer Algorithms', 'The study of efficient algorithms for various computational problems.  Algorithm design techniques.  Sorting, manipulation of data structures, graphs, matrix multiplication, and pattern matching.  Complexity of algorithms, lower bounds, NP completeness.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 3),
(33, '6364', 'CS', 'Artificial Intelligence', 'Design of machines that exhibit intelligence.  Particular topics include: representation of knowledge, vision, natural language processing, search, logic and deduction, expert systems, planning, language comprehension, machine learning.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(34, '6365', 'CS', 'Data and Text Mining for Computational Biology', 'The course introduces data and text mining as practiced currently in the bioinformatics field.  Major topics include: sequence alignment for determining similarity between proteins and genes; properties of similarities and distances; genomic, proteomic, and text databases in the real world; finding patterns', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(35, '6366', 'CS', 'Computer Graphics', 'Device and logical coordinate systems.  Geometric transformations in two and three dimensions.  Algorithms for basic 2-D drawing primitives, such as Brensenham''s algorithm for lines and circles, Bezier and B-Spline functions for curves, and line and polygon clipping algorithms.  Perspectives in 3-D, and hidden-line and hidden-face elimination, such as Painter''s and Z-Buffer algorithms.  Fractals and the Mandelbrot set.  Prerequisites: CS 5330, CS 5343, and MATH 2418', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(36, '6367', 'CS', 'Software Testing, Validation and Verification', 'Fundamental concepts of software testing. Functional testing. GUI based testing tools. Control flow based test adequacy criteria. Data flow based test adequacy criteria.  White box based testing tools. Mutation testing and testing tools. Relationship between test adequacy criteria. Finite state machine based testing. Static and dynamic program slicing for testing and debugging. Software reliability. Formal verification of program correctness.  Prerequisite: CE/CS/SE 5354 or consent of instructor.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(37, '6368', 'CS', 'Telecommunication Network Management', 'In-depth study of network management issues and standards in telecommunication networks.  OSI management protocols including CMIP, CMISE, SNMP, and MIB.  ITU''s TMN', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(38, '6369', 'CS', 'Complexity of Combinatorial Algorithms', 'Topics include bounded reducibility and completeness, approximation algorithms and heuristics for NP-hard problems, randomized algorithms, additional complexity classes.  Prerequisite: CS 6363.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(39, '6371', 'CS', 'Advanced Programming Languages', 'Functional programming, Lambda calculus, logic programming, abstract syntax, denotational semantics of imperative languages, fixpoints semantics, verification of programs, partial evaluation, interpetation and automatic compilation, axiomatic semantics, applications of semantics to software engineering. Prerequisites: CS 5343, CS 5349.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(40, '6373', 'CS', 'Intelligent Systems', 'Logical formalizations of knowledge for the purpose of implementing intelligent systems that can reason in a way that mimics human reasoning.  Topics include: syntax and semantics of common logic, description logic, modal epistemic logic; reasoning about uncertainties, beliefs, defaults and counterfactuals; reasoning within contexts; implementations of knowledge base and textual inference reasoning systems; and applications.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(41, '6374', 'CS', 'Computational Logic', 'Methods and algorithms for the solution of logic problems.  Topics include problem formulation in first order logic and extensions, theorem proving algorithms, polynomially solvable cases, logic programming, and applications.  Prerequisites: CS 5343, and knowledge of C.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(42, '6375', 'CS', 'Machine Learning', 'Algorithms for training perceptions and multi-layer neural nets: back propagation, Boltzmann machines, and self-organizing nets. The ID3 and the Nearest Neighbor algorithms. Formal models for analyzing learnability: exact identification in the limit and probably approximately correct', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 1),
(43, '6376', 'CS', 'Parallel Processing', 'Topics include parallel machine models, parallel algorithms for sorting, searching and matrix operations. Parallel graph algorithms.  Selected topics in parallel processing. Prerequisite: CS 6363.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(44, '6377', 'CS', 'Introduction to Cryptography', 'This course covers the basic aspects of modern cryptography, including block ciphers, pseudorandom functions, symmetric encryption, Hash functions, message authentication, number-theoretic primitives, public-key encryption, digital signatures and zero knowledge proofs.  Prerequisites: CS 5333 and CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(45, '6378', 'CS', 'Advanced Operating Systems', 'Concurrent processing, inter-process communication, process synchronization, deadlocks, introduction to queuing theory and operational analysis, topics in distributed systems and algorithms, checkpointing, recovery, multiprocessor operating systems.  Prerequisites: CS 5348 or equivalent; knowledge of C and UNIX.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(46, '6379', 'CS', 'Biological Database Systems and Data Mining', 'Relational data models and database management systems; theories and techniques of constructing relational databases to store biological data, including sequences, structures, genetic linkages and maps, and signal pathways.  Introduction to a relational database query language', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(47, '6380', 'CS', 'Distributed Computing', 'Topics include distributed algorithms, election algorithms, synchronizers, mutual exclusion, resource allocation, deadlocks, Byzantine agreement and clock synchronization, knowledge and common knowledge, reliability in distributed networks, proving distributed programs correct.  Prerequisite: CS 5348.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(48, '6381', 'CS', 'Combinatorics and Graph Algorithms', 'Fundamentals of combinatorics and graph theory.  Combinatorial optimization, optimization algorithms for graphs', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(49, '6382', 'CS', 'Theory of Computation', 'Formal models of computation. Recursive function theory.  Undecidability and incompleteness.  Selected topics in theory of computation.  Prerequisite: Consent of Instructor.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(50, '6383', 'CS', 'Computational Systems Biology', 'The course will provide a system-level understanding of biological systems by analyzing biological data using computational techniques.  The major topics include: computational inference of biological networks', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(51, '6384', 'CS', 'Computer Vision', 'Algorithms for extracting information from digital pictures.  Particular topics include: analysis of motion in time varying image sequences, recovering depth from a pair of stereo images, image separation, recovering shape from textured images and shadows, object matching techniques, model based recognition, the Hough transform. Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(52, '6385', 'CS', 'Algorithmic Aspects of Telecommunication Networks', 'This is an advanced course on topics related to the design, analysis, and development of telecommunications systems and networks.  The focus is on the efficient algorithmic solutions for key problems in modern telecommunications networks, in centralized and distributed models.  Topics include: main concepts in the design of distributed algorithms in synchronous and asynchronous models, analysis techniques for distributed algorithms, centralized distributed solutions for handling design and optimization problems concerning network topology, architecture, routing, survivability, reliability, congestion, dimensioning and traffic management in modern telecommunication networks.  Prerequisites: CS 5343, CS 5348, and TE 3341 or equivalents.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 2),
(53, '6386', 'CS', 'Telecommunication Software Design', 'Programming with sockets and remote procedure calls, real time programming concepts and strategies.  Operating system design for real time systems.  Encryption, file compression, and implementation of fire walls.  An in-depth study of TCP/IP implementation.  Introduction to discrete event simulation of networks. Prerequisites: CS 5390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(54, '6387', 'CS', 'Advanced Software Engineering Project', 'This course is intended to provide experience in a group project that requires advanced technical solutions, such as distributed multi-tier architectures, component-based technologies, automated software engineering, etc., for developing applications, such as web-based systems, knowledge-based systems, real-time systems, etc. The students will develop and maintain requirements, architecture and detailed design, implementation, and testing and their traceability relationships. Best practices in software engineering will be applied. Prerequisites: CS/SE 6361 or SYSM 6309, and CS/SE 6362. Corequisite: CE/CS/SE 6367 or SYSM 6310.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(55, '6388', 'CS', 'Software Project Planning and Management', 'Techniques and disciplines for successful management of software projects. Project planning and contracts.  Advanced cost estimation models.  Risk management process and activities.  Advanced scheduling techniques. Definition, management, and optimization of software engineering processes. Statistical process control.  Software configuration management.  Capability Maturity Model Integration', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(56, '6389', 'CS', 'Formal Methods and Programming Methodology', 'Formal techniques for building highly reliable systems.  Use of abstractions for concisely and precisely defining system behavior.  Formal logic and proof techniques for verifying the correctness of programs. Hierarchies of abstractions, state transition models, Petri Nets, communicating processes.  Operational and definitional specification languages.  Applications to reliability-critical, safety-critical, and mission-critical systems, ranging from commercial computer communication systems to strategic command control systems.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(57, '6390', 'CS', 'Advanced Computer Networks', 'Survey of recent advancements in high-speed network technologies.  Application of quantitative approach to the study of broadband integrated networks including admission control, access control, and quality of service guarantee. Prerequisite: CS 5390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 2),
(58, '6391', 'CS', 'Optical Networks', 'Enabling technologies for optical networks.  Wavelength-division multiplexing. Broadcast-and-select optical networks. Wavelength-routed optical networks. Virtual topology design. Routing and wavelength assignment. Network control and management. Protection and restoration. Wavelength conversion. Traffic grooming. Photonic packet switching. Optical burst switching. Survey of recent advances in optical networking. Prerequisite: CS 5390 AND one of CS 6352, CS 6385, CS 6390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(59, '6392', 'CS', 'Mobile Computing Systems', 'Topics include coping with mobility of computing systems, data management, reliability issues, packet transmission, mobile IP, end-to-end reliable communication, channel and other resource allocation, slot assignment, routing protocols, and issues in mobile wireless networks', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 0),
(60, '6393', 'CS', 'Advanced Algorithms in Biology', 'Recent advanced topics in algorithms in biology will be discussed.  Topics will be chosen from: sorting and transformational operations on strings and permutations, structural analysis of proteins, pooling design and nonadaptive group testing, approximation algorithms, and complexity issues.  Prerequisites: CS 6363 and CS 6325.', '2015-06-01 04:27:33', '2015-06-01 04:27:34', 0),
(61, '6394', 'CS', 'Digital Telephony', 'Introduction and overview emphasizing the advantages of digital voice networks.  Voice digitization. Digital transmission, multiplexing, and switching.  Rearrangeable switching networks.  Digital modulation for radio systems.  Network operation issues: synchronization, control; integration of voice and data, packet switching and traffic analysis.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(62, '6395', 'CS', 'Speech Recognition, Synthesis, and Understanding', 'Basic speech processing techniques: isolated word recognition using dynamic time warping, acoustic modeling using hidden Markov models, statistical language modeling, search algorithms in large vocabulary continuous speech recognition, components in text-to-speech systems, architecture and components in spoken dialog systems.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(63, '6396', 'CS', 'Real-Time Systems', 'Introduction to real-time applications and concepts.  Real-time operating systems and resource management.  Specification and design methods for real-time systems.  System performance analysis and optimization techniques. Project to specify, analyze, design, implement and test small real-time system.  Prerequisite: CS 5348.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(64, '6397', 'CS', 'Synthesis and Optimization of High-Performance Systems', 'A comprehensive study of the high-level synthesis and optimization algorithms for designing high performance systems with multiple CPUs or functional units for critical applications such as Multimedia, Signal processing, Telecommunications, Networks, and Graphics applications, etc. Topics including algorithms for architecture-level synthesis, scheduling, resource binding, real-time systems, parallel processor array design and mapping, code generations for DSP processors, embedded systems and hardware/software codesigns.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(65, '6398', 'CS', 'DSP Architectures', 'Typical DSP algorithms, representation of DSP algorithms, data-graph, FIR filters, convolutions, Fast Fourier Transform, Discrete Cosine Transform, low power design, VLSI implementation of DSP algorithms, implementation of DSP algorithms on DSP processors, DSP applications including wireless communication and multimedia.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(66, '6399', 'CS', 'Parallel Architectures and Systems', 'A comprehensive study of the fundamentals of parallel systems and architecture. Topics including parallel programming environment, fine-grain parallelism such as VLIW and superscalar, parallel computing paradigm of shared-memory, distributed-memory, data-parallel and data-flow models, cache coherence, compiling techniques to improve parallelism, scheduling theory, loop transformations, loop parallelizations and run-time systems.  Prerequisite: CS 5348.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(67, '6V81', 'CS', 'Independent Study in Computer Science', 'Topics vary from semester to semester.  May be repeated for credit as topics vary.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(68, '7301', 'CS', 'Recent Advances in Computing', 'Advanced topics and publications will be selected from the theory, design, and implementation issues in computing.  May be repeated for credit as topics vary.  Prerequisite: Consent of the instructor.', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(69, '8V02', 'CS', 'Topics in Computer Science', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(70, '8V07', 'CS', 'Research', 'Open to students with advanced standing subject to approval of the graduate adviser. May be repeated for credit', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(71, '8V98', 'CS', 'Thesis', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(72, '8V99', 'CS', 'Dissertation', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34', 0),
(74, '6313', 'CS', 'Statistical Methods for Data Science', 'Statistical methods for data science. Statistical Methods are developed at an intermediate level. Sampling distributions. Point and interval estimation. Parametric and nonparametric hypothesis testing. Analysis of variance. Regression, model building and model diagnostics. Monte Carlo simulation and bootstrap. ', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 1),
(75, '6350', 'CS', 'Big Data Management and Analytics', 'This course focuses on scalable data management and mining algorithms for analyzing very large amounts of data (i.e., Big Data). Included topics are: Mapreduce, NoSQL systems (e.g., key-value stores, column-oriented data stores, stream processing systems), association rule mining, large scale supervised and unsupervised learning, state of the art research in data streams, and applications including recommendation systems, web and big data security. ', '2015-06-01 04:27:32', '2015-06-01 04:27:32', 1),
(76, '1523', 'CS', 'testcourse_core', '123123', '2016-06-12 12:01:01', '2016-06-12 12:01:01', 1),
(81, '6378', 'CS', 'Advanced Operating Systems', 'Concurrent processing, inter-process communication, process synchronization, deadlocks, introduction to queuing theory and operational analysis, topics in distributed systems and algorithms, checkpointing, recovery, multiprocessor operating systems.  Prerequisites: CS 5348 or equivalent; knowledge of C and UNIX.', '2015-06-01 04:27:33', '2015-06-01 04:27:33', 2);

-- --------------------------------------------------------

--
-- 表的结构 `coursetaken`
--

CREATE TABLE IF NOT EXISTS `coursetaken` (
  `recordid` int(6) NOT NULL AUTO_INCREMENT,
  `studentid` smallint(6) NOT NULL,
  `courseid` smallint(6) NOT NULL,
  `states` smallint(6) NOT NULL,
  `grade` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- 转存表中的数据 `coursetaken`
--

INSERT INTO `coursetaken` (`recordid`, `studentid`, `courseid`, `states`, `grade`) VALUES
(24, 2, 23, 0, 86),
(26, 2, 35, 1, NULL),
(28, 2, 45, 1, NULL),
(29, 2, 16, 2, NULL),
(47, 2, 32, 2, NULL),
(54, 2, 76, 0, 56),
(57, 2, 51, 1, NULL),
(64, 8, 2, 2, NULL),
(91, 8, 52, 2, NULL),
(92, 2, 2, 2, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Userid` smallint(6) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Userloginname` varchar(32) NOT NULL,
  `Userloginpassword` varchar(32) NOT NULL,
  `Userdegreeplanid` smallint(6) DEFAULT NULL,
  `tel` char(200) DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  PRIMARY KEY (`Userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`Userid`, `Username`, `Userloginname`, `Userloginpassword`, `Userdegreeplanid`, `tel`, `email`) VALUES
(1, 'Kainan Xu', 'Kainan Xu', '123', 3, '1234568789', 'ads@hotmail.com'),
(2, 'Bill Gates', 'Bill Gates', '123', 3, '6951225412', '12312@qq.com'),
(3, 'Test', 'Test', '123', 3, '5956325598', '4895@asda.com'),
(4, 'TestAdmin', 'TestAdmin', '123 ', 0, '1596236597', 'asd@163.com'),
(5, 'TestAdmin_2', 'TestAdmin_2', '123', 0, '5698452365', 'harswe_gmail.com'),
(6, 'Test_4', 'Test_4', '123', 3, '5412593547', 'Linken@qq.com'),
(7, 'student', 'student', 'student', 0, '1593652148', 'lily@sohu.com'),
(8, 'Harry Poter', 'Harry Poter', '123', 4, '1234567890', '123@hotmail.com'),
(9, 'test_10', 'test_10', '123', 3, '123', '123@asd.com'),
(10, 'admin', 'admin', 'admin', 0, '2149851365', 'asdads@hotmail.com'),
(11, 'Test_Admin_2', 'Test_Admin_2', '123', 0, '5468546635', 'adasd@hotmail.com'),
(12, '852', '852', '456', 3, '5214523652', '524@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
