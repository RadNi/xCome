import unittest
from time import sleep

from selenium import webdriver
from test_utility import static_data, fields


class AddClerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=Radni", "password=testtest",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/clerks-table")
        self.driver.find_element_by_id("addShow").click()

    def test_empty_name(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_family(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_email(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_national_id(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "username=smjfas", "password=hello123", "income=100",
                                                    "repass=hello123", "cellphone=09398604014",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b=len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_username(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_password(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_repass(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.",
                                                    "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_phone_num(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "income=100",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_address(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a-b is 0

    def test_empty_income(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "captcha=1234",
                                                    "address=21st number baker st.", "submit"])[9].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a -b is 0

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
