use patient_management;

INSERT INTO Patient VALUES (
  "1",
  "abdallah",
  "1980-02-25",
  "male",
  "indian",
  "2012-04-12",
  "heart attack",
  "heart transplant",
  "poor man"
);

INSERT INTO Pain (
  PainID,
  LocationOfPain,
  Pattern,
  Intensity,
  AtThisMoment,
  CharacterOfPain,
  Radiation,
  TypeOfPain,
  MedicationPlan
) VALUES (
  "1",
  "arm",
  "Constant",
  1,
  "Best",
  "Shooting",
  "radiation",
  "Mixed",
  "plan: blah bleh bloh"
);

INSERT INTO Medicine VALUES (
  "1",
  "1",
  "1",
  "2012-09-23",
  "drug111",
  "100 g",
  "twice a day",
  "oral",
  "headache",
  "blah blah"
);
