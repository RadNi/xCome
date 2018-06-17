import unittest
from selenium import webdriver
from test_utility import static_data, fields


class AddClerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_empty_name(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_family(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_email(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_national_id(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "username=smjfas", "password=hello123", "income=100",
                                               "repass=hello123", "cellphone=09398604014",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_empty_username(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100"
                                                                                           "address=21st number baker st.",
                                               "captcha=1234", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_password(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_empty_repass(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "cellphone=09398604014", "income=100"
                                                                        "address=21st number baker st.", "captcha=1234",
                                               "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_phone_num(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "income=100",
                                               "address=21st number baker st.", "captcha=1234", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_address(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "captcha=1234", "add"])[10].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_empty_captcha(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "income=100",
                                               "address=21st number baker st.", "add"])[10].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_empty_income(self):
        driver = self.driver
        driver.get(static_data.base_url + "boss/clerk-table")
        driver.find_element_by_id("addShow").click()
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014", "captcha=1234",
                                               "address=21st number baker st.", "add"])[10].click()

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
